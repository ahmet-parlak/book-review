<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\BookCategory;

class Dashboard extends Controller
{
    public function index()
    {
        $publishers = Publisher::count();
        $authors = Author::count();
        $books = Book::count();
        return view('dashboard', compact(['publishers', 'authors', 'books']));
    }
}
