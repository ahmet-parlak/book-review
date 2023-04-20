<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthUserController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ListController;

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

    //User 
    Route::group(['prefix' => 'auth/user', 'controller' => AuthUserController::class], function () {
        Route::get('/', 'index');                   //get user credentials
        Route::put('/', 'update');                  //update profile
        Route::post('/', 'update');                 //update profile photo
        Route::put('/password', 'passwordUpdate');  //update password
    });

    //Search
    Route::group(['prefix'=>'search', 'controller' => SearchController::class],function(){
        Route::get('/','search');           //search with query
        Route::get('/top100','top100');     //top rated books
    });

    //Book
    Route::group(['prefix'=>'book', 'controller' => BookController::class],function(){
        Route::get('/{id}','bookDetail');       //get book
        Route::post('/{id}/report','report');   //report book
        Route::post('/{id}/review','review');   //review book
        Route::put('/{id}/review','editReview');    //edit review book
    });

    //BookList
    Route::group(['prefix'=>'list', 'controller' => ListController::class], function(){
        Route::post('/', 'store');              //create list
        Route::patch('/', 'update');            //update list
        Route::delete('/', 'destroy');          //delete list
        
        Route::post('/add', 'addBook');         //add book
        Route::post('/remove', 'removeBook');   //remove book
    });


});
