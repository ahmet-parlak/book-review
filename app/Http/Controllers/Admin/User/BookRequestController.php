<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookRequest;

class BookRequestController extends Controller
{
    public function index()
    {
        $book_requests = BookRequest::orderBy('created_at','desc')->with('user')->paginate(10);
        return view('admin.user.book-requests.index', compact('book_requests'));
    }
}
