<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookReport;
use App\Models\AuthorReport;
use App\Models\PublisherReport;

class ReportController extends Controller
{
    public function index()
    {
        $books = BookReport::count();
        $authors = AuthorReport::count();
        $publishers = PublisherReport::count();
        
        return view('admin.user.reports.index', compact(['publishers', 'authors', 'books']));
    }

    public function books()
    {
        $reports = BookReport::with('user','book')->paginate(10);
        
        return view('admin.user.reports.books', compact(['reports']));
    }

    public function authors()
    {
        $reports = AuthorReport::with('user','author')->paginate(10);
        
        return view('admin.user.reports.authors', compact(['reports']));
    }

    public function publishers()
    {
        $reports = PublisherReport::with('user','publisher')->paginate(10);
        
        return view('admin.user.reports.publishers', compact(['reports']));
    }
}
