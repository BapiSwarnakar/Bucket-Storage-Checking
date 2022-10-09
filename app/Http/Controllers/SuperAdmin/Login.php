<?php
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuperAdminModel;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class Login extends Controller
{
    public function Login_Request(Request $rqst)
    {
       $username = $rqst->username;
       $password =  Helper::Encrypt_Password($rqst->password);
       $count = SuperAdminModel::where('USERNAME',$username)->count();
       if($count >0)
       {
        $sql = SuperAdminModel::where('USERNAME',$username)->first();
        if($sql->PASSWORD == $password)
          {
             if($sql->STATUS==1)
             {
                $token = Helper::Encrypt_Password(rand());
                $update = SuperAdminModel::where('ID',$sql->ID)->update(['TOKEN'=>$token]);
                if($update)
                {
                    
                    $rqst->session()->put('SUPER_ID',$sql->ID);
                    $rqst->session()->put('SUPER_TOKEN',$token);
                    echo json_encode(
                        [
                            'status'=>true,
                            'redirect'=>true,
                            'reload'=>false,
                            'url'=>url('Super/Dashboard'),
                            'message'=>'Login Successfully'
                        ]
                        );
                }
                else{

                    echo json_encode(
                        [
                            'status'=>false,
                            'redirect'=>false,
                            'reload'=>true,
                            'message'=>'Technical issue, Please Try Again !'
                        ]
                        );
                }
                
 
             }
             else{
                 echo json_encode(
                     [
                         'status'=>false,
                         'redirect'=>false,
                         'reload'=>false,
                         'message'=>'Your Account is Deactivate !'
                     ]
                     );
             }
          }
          else{
             echo json_encode(
                 [
                     'status'=>false,
                     'redirect'=>false,
                     'reload'=>false,
                     'message'=>'Your Password is Invalid !'
                 ]
                 );
             }
       }
       else{

        echo json_encode(
            [
                'status'=>false,
                'redirect'=>false,
                'reload'=>false,
                'message'=>"Your Username is Invalid !"
            ]
            );

       }
       
    
    }

  public function Logout_Request(Request $rqst)
   {
     
    if($rqst->session()->has('SUPER_TOKEN') && $rqst->session()->has('SUPER_ID'))
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $time = date("g:i:s A");
        $rqst->session()->pull('SUPER_TOKEN',null);
        $rqst->session()->pull('SUPER_ID',null); 
    }
    echo json_encode(
        [
            'status'=>true,
            'redirect'=>true,
            'reload'=>false,
            'url'=>url('Super/Login'),
            'message'=>'Logout Successfully'
        ]
        );

   }



}
?>