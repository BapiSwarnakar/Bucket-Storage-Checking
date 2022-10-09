<?php
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuperAdminModel;
use App\Models\AdminModel;
use App\Models\BallModel;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class Ball extends Controller
{
    public function Ball_Display(Request $rqst)
    {
       $data = BallModel::all();
       return view("Dashboard/SuperAdmin/ball",['data'=>$data,'display'=>'list'])->with('no',1);
    }
   
    public function Add_Ball(Request $rqst)
    {
       return view("Dashboard/SuperAdmin/ball",['display'=>'add'])->with('no',1);
    }

    public function Edit_Ball($id)
    {
       $data = AdminModel::where('ID',$id)->first();
       return view("Dashboard/SuperAdmin/ball",['data'=>$data,'display'=>'edit'])->with('no',1);
    }

   public function Ball_Store_Request(Request $rqst)
    {  

      if($rqst->action=="add")
      {

        $input = [ 
                   'BALL_NAME'=>$rqst->name,
                   'BALL_SIZE'=>$rqst->size,
                  ];
              $insert = BallModel::insert($input);
              if($insert)
              {
               return json_encode(
                  [
                      'status'=>true,
                      'redirect'=>true,
                      'reload'=>false,
                      'url'=>url('Super/Ball/List'),
                      'message'=>'Data Saved Successfully'
                  ]
                  );
              }
              else
              {
                  return json_encode(
                     [
                        'status'=>false,
                        'redirect'=>false,
                        'reload'=>true,
                        'message'=>'Technical issue, Please Try Again !'
                     ]
                     );
              }
      }
      if($rqst->action=="edit")
      {
        $input = [ 
                   'APIURL'=>$rqst->api_url,
                   'METHOD_TYPE'=>$rqst->method,
                   'FORMAT'=>$rqst->format
                  ];
              $insert = Sms_Api::where('ID',$rqst->id)->update($input);
              if($insert)
              {
                  return ["status"=>true,"message"=>"Api Update Successfully"];
              }
              else
              {
               return ["status"=>false,"message"=>"Form Inserted Failed!"];
              }
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
}
?>