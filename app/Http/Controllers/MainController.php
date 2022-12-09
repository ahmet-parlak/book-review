<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Contracts\Database\Eloquent\Builder;

class MainController extends Controller
{
    public function home(Request $request)
    {
        return view('bookReview.home');
    }


    public function search(Request $request)
    {
        $request->has('search') ?: abort(404);

        strlen($request->input("search")) < 3 ? abort(404) : "";

        $books = Book::where("title", "LIKE", "%" . $request->input("search") . "%")
            ->orWhere("isbn", "LIKE", "%" . $request->input("search") . "%")
            ->orWhereHas('publisher', function (Builder $query) use ($request) {
                $query->where('publisher_name', 'like', '%' . $request->input("search") . '%');
            })
            ->orWhereHas('author.author', function (Builder $query) use ($request) {
                $query->where('author_name', 'like', '%' . $request->input("search") . '%');
            })
            ->orderBy('updated_at', 'desc')->paginate(18)->withQueryString();

        return view('bookReview.search', compact('books'));
    }


    public function book($id)
    {
        $book = Book::whereId($id)->with('publisher')->first() ?? abort(404, 'Kitap Bulunamadı');
        //return $book;
        return view('bookReview.bookDetail', compact('book'));
    }
}
