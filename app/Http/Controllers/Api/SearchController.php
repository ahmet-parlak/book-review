<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchRequest;
use App\Models\Book;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $searchQuery = $request->input("query");
        $books = Book::where("title", "LIKE", "%" . $searchQuery . "%")
            ->orWhere("isbn", "LIKE", "%" . $searchQuery . "%")
            ->orWhereHas('publisher', function (Builder $query) use ($searchQuery) {
                $query->where('publisher_name', 'like', '%' . $searchQuery . '%');
            })
            ->orWhereHas('author.author', function (Builder $query) use ($searchQuery) {
                $query->where('author_name', 'like', '%' . $searchQuery . '%');
            })
            ->withCount('reviews')->orderByDesc('reviews_count')
            ->orderBy('updated_at', 'desc')->simplePaginate(20)->withQueryString($request->all());
        
        return response($books);
    }

    public function top100()
    {
        $books = Book::withCount('reviews')->orderByDesc('reviews_count')
            ->orderBy('updated_at', 'desc')->paginate(18)->withQueryString();

        return response($books);
    }
}
