<?php
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuperAdminModel;
use App\Models\AdminModel;
use App\Models\BucketHistoryModel;
use App\Models\BucketModel;
use App\Models\BallModel;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class BallPlaced extends Controller
{

    public function BallPlaced_Display(Request $rqst)
    {
       $data = BucketHistoryModel::join('ball','ball.BALL_ID','bucket_history.BALL_ID')->join('bucket','bucket.ID','bucket_history.B_ID')->get();
       return view("Dashboard/SuperAdmin/ball_placed",['data'=>$data,'display'=>'list'])->with('no',1);
    }
   
    public function Add_BallPlaced(Request $rqst)
    {
       $data = BallModel::all();
       return view("Dashboard/SuperAdmin/ball_placed",['display'=>'add','ball_list'=>$data])->with('no',1);
    }

    public function Edit_BallPlaced($id)
    {
       $data = AdminModel::where('ID',$id)->first();
       return view("Dashboard/SuperAdmin/ball_placed",['data'=>$data,'display'=>'edit'])->with('no',1);
    }

   public function BallPlaced_Store_Request(Request $rqst)
    {  
     
      $ball_id = $rqst->ball_name;
      $value = $rqst->ball_value;
      $ball  = BallModel::where('BALL_ID',$ball_id)->first();
      $ball_size = $ball->BALL_SIZE*$value;
      if($rqst->action=="add")
      {
       
         $bucket = BucketModel::all();
         foreach($bucket as $item)
         {
            $load = $item->B_LOAD;
            $size = $item->B_SIZE;
            $space = $size-$load;

            if($space >= $ball_size)
            {
               $id = $item->ID;
               $bucket_history = BucketHistoryModel::insert(['B_ID'=>$id,'BALL_ID'=>$ball_id,'BALL_COUNT'=>$value]);
               $bucket = BucketModel::where('ID',$id)->update(['B_SPACE'=>$space-$ball_size,'B_LOAD'=>$load+$ball_size]);
               return json_encode(
                  [
                     'status'=>true,
                     'redirect'=>false,
                     'reload'=>true,
                     'message'=>"Ball Saved ".$item->B_NAME." Bucket Successfully"
                  ]
                  );
               exit();
            }
            else{
               
               $response = json_encode(
                  [
                     'status'=>false,
                     'redirect'=>false,
                     'reload'=>false,
                     'message'=>"Not Space Any Bucket !"
                  ]
                  );
            }
         }

      return $response;
        
      }
      
    }


    public function Delete_Company(Request $rqst)
    {
       $id = $rqst->id;
       $sql = Sms_Api::where('ID',$id)->delete();
       if($sql)
       {
         echo json_encode(['status'=>200,'msg'=>'API Delete Success']);
       }
       else
       {
          echo json_encode(['status'=>300,'msg'=>'Technical issue, Please try again !']);
       }

    }

    public function Status_Change_Company(Request $rqst)
    {
       $id = $rqst->id;
       $value = $rqst->value;
       if($value==1)
       {
         $update = 0;
       }
       else
       {
         $update =1;
       }
       
       $sql = Sms_Api::where('ID',$id)->update(['STATUS'=>$update]);
       if($sql)
       {
         echo json_encode(['status'=>200,'msg'=>'API Status Update Success']);
       }
       else
       {
          echo json_encode(['status'=>300,'msg'=>'Technical issue, Please try again !']);
       }

    }

    public function Load_Bucket(Request $rqst)
    {
      $response = array();
      $data = BucketModel::all();
      foreach($data as $item){
         if($item->B_NAME=="A")
         {
            $response['a']='<br><span class="text-info">Bucket Size: <b id="e_size">'.$item->B_SIZE.'</b></span><br>
            <span class="text-success">Empty Space: <b id="e_space">'.$item->B_SPACE.'</b></span><br>
            <span class="text-danger">Total Load: <b id="e_load">'.$item->B_LOAD.'</b></span> ';
         }
         elseif ($item->B_NAME=="B") {
            $response['b']='<br><span class="text-info">Bucket Size: <b id="e_size">'.$item->B_SIZE.'</b></span><br>
            <span class="text-success">Empty Space: <b id="e_space">'.$item->B_SPACE.'</b></span><br>
            <span class="text-danger">Total Load: <b id="e_load">'.$item->B_LOAD.'</b></span> ';
         }
         elseif ($item->B_NAME=="C") {
            $response['c']='<br><span class="text-info">Bucket Size: <b id="e_size">'.$item->B_SIZE.'</b></span><br>
            <span class="text-success">Empty Space: <b id="e_space">'.$item->B_SPACE.'</b></span><br>
            <span class="text-danger">Total Load: <b id="e_load">'.$item->B_LOAD.'</b></span> ';
         }
         elseif ($item->B_NAME=="D") {
            $response['d']='<br><span class="text-info">Bucket Size: <b id="e_size">'.$item->B_SIZE.'</b></span><br>
            <span class="text-success">Empty Space: <b id="e_space">'.$item->B_SPACE.'</b></span><br>
            <span class="text-danger">Total Load: <b id="e_load">'.$item->B_LOAD.'</b></span> ';
         }
         else{
            $response['e']='<br><span class="text-info">Bucket Size: <b id="e_size">'.$item->B_SIZE.'</b></span><br>
            <span class="text-success">Empty Space: <b id="e_space">'.$item->B_SPACE.'</b></span><br>
            <span class="text-danger">Total Load: <b id="e_load">'.$item->B_LOAD.'</b></span> ';
         }
      }

   echo json_encode($response);

    }
}
?>