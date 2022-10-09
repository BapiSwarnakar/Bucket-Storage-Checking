<?php
namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SuperAdminModel;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class Dashboard extends Controller
{
    public function Super_Dashboard(Request $rqst)
    {
    //    $val = Helper::Decrypt_Password('UThVbzFKYz0=');
       return view("Dashboard/SuperAdmin/dashboard");
    }
}
?>