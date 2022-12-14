<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('search', [MainController::class, 'search'])->name('search');
Route::get('book/{id}/{slug}', [MainController::class, 'book'])->name('book');
Route::get('publisher/{id}/{slug}', [MainController::class, 'publisher'])->name('publisher');
Route::get('author/{id}/{slug}', [MainController::class, 'author'])->name('author');

/* User Logined */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('book/{id}/{slug}', [ReviewController::class, 'create'])->name('book.post');
});


/* Admin Panel */
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('panel', [Admin\Dashboard::class, 'index'])->name('dashboard');

    Route::post('books/fetchAuthors', [Admin\BookController::class, 'fetchAuthors'])->name('books.fetchauhors');
    Route::resource('books', Admin\BookController::class);

    Route::resource('authors', Admin\AuthorController::class);

    Route::resource('publishers', Admin\PublisherController::class);

    Route::resource('categories', Admin\CategoryController::class);

    Route::get('fetch-books', [Admin\FetchBooks::class, 'index']);
    Route::post('fetch-books', [Admin\FetchBooks::class, 'fetch'])->name('fetchbooks');
});;
