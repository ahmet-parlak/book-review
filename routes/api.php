<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Authentication
Route::controller(AuthController::class)->group(function () {
    Route::post('/auth', 'auth');
    Route::post('/register', 'register');
});

//AuthUser
Route::middleware('auth:sanctum')->group(function () {

    //Controller Group
    /*  Route::group(['prefix'=>'auth/user'], function(){
        Route::controller(AuthUserController::class)->group(function(){
            Route::get('/', 'index');                   //get user credentials
            Route::put('/','update');                   //update profile
            Route::post('/','update');                  //update profile photo
            Route::put('/password', 'passwordUpdate');  //update password
        });
    }); 
    */

    Route::group(['prefix' => 'auth/user', 'controller' => AuthUserController::class], function () {
        Route::get('/', 'index');                   //get user credentials
        Route::put('/', 'update');                  //update profile
        Route::post('/', 'update');                 //update profile photo
        Route::put('/password', 'passwordUpdate');  //update password
    });


});
