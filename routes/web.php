<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ReportController;

use App\Models\Book;
use App\Models\BookTag;

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
Route::get('search?search=top-100', [MainController::class, 'search'])->name('top-100');
Route::get('book/{id}/{slug}', [MainController::class, 'book'])->name('book');
Route::get('publisher/{id}/{slug}', [MainController::class, 'publisher'])->name('publisher');
Route::get('author/{id}/{slug}', [MainController::class, 'author'])->name('author');
Route::get('user/{id}/{name}', [MainController::class, 'user'])->name('user');
Route::get('list/{id}/{name}', [MainController::class, 'list'])->name('list');

/* User Logined */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('book/{id}/{slug}', [ReviewController::class, 'create'])->name('book.post');

    Route::get('mybooks', [MainController::class, 'mybooks'])->name('mybooks');

    Route::get('myreviews', [MainController::class, 'myreviews'])->name('myreviews');
    Route::post('remove-review', [ReviewController::class, 'delete'])->name('review.remove');
    Route::get('edit-review/{id}/{slug}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::post('edit-review/{id}/{slug}', [ReviewController::class, 'update'])->name('review.edit.post');

    Route::get('mylists', [ListController::class, 'mylists'])->name('mylists');
    Route::get('mylists/{id}/{list}', [ListController::class, 'mylist'])->name('mylist');
    Route::post('mylists/edit-name', [ListController::class, 'editName'])->name('mylist.edit.name');
    Route::post('mylists/edit-state', [ListController::class, 'editState'])->name('mylist.edit.state');
    Route::post('mylists/remove-book', [ListController::class, 'removeBook'])->name('mylist.remove.book');
    Route::post('mylists/add-book', [ListController::class, 'addBook'])->name('mylist.add.book');
    Route::post('mylists/delete-list', [ListController::class, 'deleteList'])->name('mylist.delete.list');

    Route::get('book-request', [MainController::class, 'bookRequest'])->name('book-request');
    Route::post('book-request', [MainController::class, 'createBookRequest']);

    Route::post('report-book', [ReportController::class, 'reportBook'])->name('report.book');
    Route::post('report-author', [ReportController::class, 'reportAuthor'])->name('report.author');
    Route::post('report-publisher', [ReportController::class, 'reportPublisher'])->name('report.publisher');
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

    Route::get('user/book-requests', [Admin\User\BookRequestController::class, 'index'])->name('user.book-requests.index');

    /* User Reports */
    Route::get('user/reports', [Admin\User\ReportController::class, 'index'])->name('user.reports.index');
    Route::get('user/reports/books', [Admin\User\ReportController::class, 'books'])->name('user.reports.books');
    Route::get('user/reports/authors', [Admin\User\ReportController::class, 'authors'])->name('user.reports.authors');
    Route::get('user/reports/publishers', [Admin\User\ReportController::class, 'publishers'])->name('user.reports.publishers');
});
