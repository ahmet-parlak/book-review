<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $startDate = Carbon::now()->subDays(30);

        $trendBooks = Book::join('reviews', 'books.id', '=', 'reviews.book_id')
            ->select('books.*', DB::raw('COUNT(reviews.id) as review_count'))
            ->where('reviews.created_at', '>=', $startDate)
            ->groupBy('books.id')
            ->orderByDesc('review_count')
            ->take(6)
            ->get();



        $newBooks = Book::latest('id')->limit(6)->get();

        $mostReads = Book::from('books')
        ->select('books.*', DB::raw('COUNT(book_list.book_id) AS book_count'))
        ->join('book_list', 'books.id', '=', 'book_list.book_id')
        ->join('book_lists', 'book_list.list_id', '=', 'book_lists.id')
        ->where('book_lists.list_name', 'read')
        ->groupBy('books.id')
        ->orderBy('book_count', 'DESC')
        ->take(6)
        ->get();

        $highRatedBooks =Book::join('reviews', 'books.id', '=', 'reviews.book_id')
            ->select('books.*', DB::raw('AVG(reviews.rating) AS average_rating'))
            ->groupBy('books.id')
            ->orderByDesc('average_rating')
            ->take(6)
            ->get();

        

        $trendBooksData = ['title' => 'Trend Kitaplar', 'books' => $trendBooks];
        $newBooksData = ['title' => 'Yeni Eklenenler', 'books' => $newBooks];
        $mostReadsData = ['title' => 'Çok Okunanlar', 'books' => $mostReads];
        $highRatedBooksData = ['title' => 'Yüksek Puanlılar', 'books' => $highRatedBooks];
        
        $data = [$trendBooksData, $mostReadsData, $highRatedBooksData, $newBooksData];
        $response = ['state' => 'success', 'data' => $data];
        return response($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
