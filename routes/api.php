<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthUserController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\BookRequestController;
use App\Http\Controllers\Api\UserDetailController;
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
    
    //home
    Route::controller(HomeController::class)->group(function(){
        Route::get('/home','index');
    });

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
    Route::group(['prefix'=>'mylists', 'controller' => ListController::class], function(){
        Route::get('/','index');                //get all lists
        Route::get('/{id}','show');             //get list
        Route::post('/', 'store');              //create list
        Route::post('/{id}', 'update');            //update list
        Route::delete('/{id}', 'destroy');          //delete list
        
        Route::get('/{id}/add/{book}', 'addBook');         //add book
        Route::get('/{id}/remove/{book}', 'removeBook');   //remove book
    });


    //UserReviews
    Route::group(['prefix'=>'myreviews','controller' =>ReviewController::class], function(){

        Route::get('/','index');
        Route::delete('/{id}','destroy');
    });


    //BookRequest
    Route::controller(BookRequestController::class)->group(function (){
        Route::post('/bookrequest', 'createBookRequest');
    });

    //UserDetail
    Route::controller(UserDetailController::class)->group(function (){
        Route::get('/user/{id}','show');
        Route::get('/user/{userId}/list/{listId}','list');
        Route::get('/user/{id}/reviews','reviews');
    });


});
