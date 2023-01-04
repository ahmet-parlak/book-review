<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookReport;

class ReportController extends Controller
{
    public function index()
    {
        $books = BookReport::count();
        $publishers = 0;
        $authors = 0;
        
        return view('admin.user.reports.index', compact(['publishers', 'authors', 'books']));
    }

    public function books()
    {
        $reports = BookReport::with('user','book')->paginate(10);
        
        return view('admin.user.reports.books', compact(['reports']));
    }

    public function authors()
    {
        $authors = 0;
        
        return view('admin.user.reports.authors', compact(['authors']));
    }

    public function publishers()
    {
        $publishers = 0;
        
        return view('admin.user.reports.publishers', compact(['publishers']));
    }
}
