<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Review;
use App\Models\BookLists;
use App\Models\BookList;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Contracts\Database\Eloquent\Builder;


class MainController extends Controller
{
    public function home()
    {
        $trendBooks = Review::select('*', DB::raw('count(*) as total'))
            ->groupBy('book_id')
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->orderByDesc('total')
            ->with('book')->limit(6)->get();
        $newBooks = Book::latest('id')->limit(6)->get();
        return view('bookReview.home', compact('newBooks', 'trendBooks'));
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
        $lists = BookLists::where('user_id', auth()->user()->id ?? 0)->get();
        return view('bookReview.bookDetail', compact('book', 'lists'));
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

    public function mybooks()
    {
        $reviews = Review::whereUserId(auth()->user()->id)->with('book')->orderByDesc('created_at')->limit(4)->get();
        $book_lists = BookLists::where('user_id', auth()->user()->id)->with('books')->limit(5)->get();
        return view('bookReview.mybooks', compact('reviews', 'book_lists'));
    }

    public function myreviews()
    {
        $reviews = Review::whereUserId(auth()->user()->id)->with('book')->orderByDesc('created_at')->paginate(10);
        return view('bookReview.myreviews', compact('reviews'));
    }

    public function user($id, $name)
    {
        $user = User::find($id) ?? abort(404, "KULLANICI BULUNAMADI");
        $reviews = Review::where('user_id', $id)->with('book')->get();
        $lists = BookLists::where('user_id', $id)->with('books')->where('status', 'public')->get();
        //return $lists;
        return view('bookReview.user', compact('user', 'reviews', 'lists'));
    }

    public function list($id, $name)
    {
        $list = BookLists::whereId($id)->with('books.book')->with('user')->where('status', 'public')->first();
        //return $list;
        return view('bookReview.list', compact('list'));
    }
}
