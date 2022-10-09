<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\Sms_Api;
use App\Models\Sms_Manager;
use GuzzleHttp\Client as GuzzleClient;
use File;

class Helper
{

  public static function Reference_id()
  {
      $rand = rand(00000000,99999999);
      $Reference_id = "QPHTID".$rand;
      return $Reference_id;
  }


  public static function Get_Image($path,$filename)
  {
  
   $path = storage_path($path . $filename);
   if (!File::exists($path)) {
       abort(404);
   }
   
   $file = File::get($path);
   $type = File::mimeType($path);

   $response = Response::make($file, 200);
   
   $response->header("Content-Type", $type);

   return $response;
 }

 
public static function SEND_SMS($service,$MOBILE)
 {
	$otp = mt_rand(99999 , 1000000);
  $smsmanager = Sms_Manager::where("SERVICE",$service)->where("STATUS","Active")->first();
  $serviceapi = $smsmanager->SERVICEAPI;
  $TEMPID = $smsmanager->TEMPLATE_ID;
  $MESSAGE = urlencode(str_replace('{$var}',$otp,$smsmanager->MESSAGE));
  $url = Sms_Api::where("NAME",$serviceapi)->first()->APIURL;
  preg_match_all('~\{\$(.*?)\}~si', $url, $matches);
  if (isset($matches[1])) {
      $data = compact($matches[1]);
      foreach($data as $var => $value) {
          $api_url = str_replace('{$'.$var.'}', $value, $url);
          $url = $api_url;
      }
    }
	$method = "GET";
	$client = new GuzzleClient();
	$request = $client->request($method, $api_url);
	$response = $request->getBody()->getContents();
	return $otp;
 }

public static function Send_Mail($email,$subject,$body_url)
  {
      $data = array('name'=>"Quickpayhub",'data'=>'Hello User ');
      $user=['email'=>$email];
      Mail::send($body_url, $data, function($message) use($user) {
          $message->to($user['email']);
          $message->subject('Your Verify OTP');
       });
       
    if (Mail::failures()) {
         return false;
    }else{
        return true;
      }
  } 

  public static function Encrypt_Password($password){
    $ciphering = "AES-128-CTR";
    $options   = 0;
    $iv = 'CreateByBapi@#$%^&*()@#$';
    $encryption_iv = substr(hash('sha256', $iv), 0, 16);
    $encryption_key = "Bapi@1234";
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
    return base64_encode($encryption);
    }

 public static function Decrypt_Password($password){
    $ciphering = "AES-128-CTR";
    $iv = 'CreateByBapi@#$%^&*()@#$';
    $decryption_iv = substr(hash('sha256', $iv), 0, 16);
    $decryption_key = "Bapi@1234";
    $decryption = openssl_decrypt(base64_decode($password), $ciphering, $decryption_key, 0, $decryption_iv);
    return $decryption;
}


  
}
?>