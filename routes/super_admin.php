<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SuperAdmin\Login;
use App\Http\Controllers\SuperAdmin\Dashboard;
use App\Http\Controllers\SuperAdmin\Company;
use App\Http\Controllers\SuperAdmin\Ball;
use App\Http\Controllers\SuperAdmin\BallPlaced;
use App\Http\Middleware\SuperAdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('Super')->group(function(){


    Route::get('/Login',function(){
        if(session()->has('SUPER_ID') && session()->has('SUPER_TOKEN'))
        {
            return redirect("/Super/Dashboard");
        }
        return view('Login/SuperAdmin/login');
    });
    
    Route::post('/Login_Request',[Login::class,'Login_Request']);
    Route::group(['middleware' => ['SuperAdminMiddleware']],function(){ 

        Route::post('/Logout_Request',[Login::class,'Logout_Request']);
        Route::get('/Dashboard',[Dashboard::class,'Super_Dashboard']);
        // Bucket 
        Route::get('/Bucket/List',[Company::class,'Company_Display']);
        Route::get('/Bucket/Add',[Company::class,'Add_Company']);
        Route::get('/Bucket/Edit/{id}',[Company::class,'Edit_Company']);
        Route::post('/Company_Store_Request',[Company::class,'Company_Store_Request']);
        // Ball
        Route::get('/Ball/List',[Ball::class,'Ball_Display']);
        Route::get('/Ball/Add',[Ball::class,'Add_Ball']);
        Route::get('/Ball/Edit/{id}',[Ball::class,'Edit_Ball']);
        Route::post('/Ball_Store_Request',[Ball::class,'Ball_Store_Request']);
   
        // Ball Placed
        Route::get('/Ball-Placed/List',[BallPlaced::class,'BallPlaced_Display']);
        Route::get('/Ball-Placed/Add',[BallPlaced::class,'Add_BallPlaced']);
        Route::get('/Ball-Placed/Edit/{id}',[BallPlaced::class,'Edit_BallPlaced']);
        Route::post('/Ball_Placed_Store_Request',[BallPlaced::class,'BallPlaced_Store_Request']);
        Route::get('/Ball-Placed/Edit/{id}',[BallPlaced::class,'Edit_BallPlaced']);

        Route::post('/Ball-Placed/Load_Bucket',[BallPlaced::class,'Load_Bucket']);


        
        



    });


});

