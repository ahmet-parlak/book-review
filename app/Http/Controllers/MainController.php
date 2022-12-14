<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Contracts\Database\Eloquent\Builder;
use PHPUnit\Framework\Constraint\Count;

class MainController extends Controller
{
    public function home(Request $request)
    {
        return view('bookReview.home');
    }


    public function search(Request $request)
    {
        $request->has('search') ?: abort(404);

        strlen($request->input("search")) < 3 ? abort(404) : true;

        $books = Book::where("title", "LIKE", "%" . $request->input("search") . "%")
            ->orWhere("isbn", "LIKE", "%" . $request->input("search") . "%")
            ->orWhereHas('publisher', function (Builder $query) use ($request) {
                $query->where('publisher_name', 'like', '%' . $request->input("search") . '%');
            })
            ->orWhereHas('author.author', function (Builder $query) use ($request) {
                $query->where('author_name', 'like', '%' . $request->input("search") . '%');
            })
            ->withCount('reviews')
            ->orderByDesc('reviews_count')
            ->orderBy('updated_at', 'desc')->paginate(18)->withQueryString();
        //return $books;
        return view('bookReview.search', compact('books'));
    }


    public function book($id)
    {
        $book = Book::whereId($id)->with('publisher')->with('reviews')->first() ?? abort(404, 'Kitap Bulunamadı');
        return view('bookReview.bookDetail', compact('book'));
    }

    public function publisher($id, $slug)
    {
        $publisher = Publisher::whereId($id)->first() ?? abort(404, 'YAYINEVİ BULUNAMADI');
        return view('bookReview.publisherDetail', compact('publisher'));
    }

    public function author($id, $slug)
    {
        $author = Author::whereId($id)->first() ?? abort(404, 'YAZAR BULUNAMADI');
        return view('bookReview.authorDetail', compact('author'));
    }
}
