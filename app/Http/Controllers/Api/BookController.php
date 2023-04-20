<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookLists;
use App\Models\BookList;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class BookController extends Controller
{

    public function bookDetail($id)
    {
        $book = Book::whereId($id)->with('publisher')->with('reviews')->first();
        $lists = BookLists::where('user_id', auth()->user()->id ?? 0)->get();
        $response = ['book'=>$book, 'user_lists'=>$lists];
        return response($response);
    }

    public function report(Request $request)
    {
        return app('App\Http\Controllers\ReportController')->reportBook($request);
    }

    public function review(Request $request){

        if(Review::where(['user_id' => Auth::id(), 'book_id' => $request->book])->first()) return response()->json(['success'=>false, 'message'=>'Kitap zaten değerlendirilmiş']); 

        Review::create(['user_id' => Auth::id(), 'book_id' => $request->book, 'rating' => $request->rating, 'review' => $request->review]);
        $readList = BookLists::where('user_id', Auth::id())->where('list_name', 'read')->first();
        BookList::firstOrCreate(['list_id' => $readList->id, 'book_id' => $request->book]);

        $book = Book::whereId($request->book)->with('publisher')->with('reviews')->first();
        
        return response()->json(['success'=>true, 'book'=>$book, 'message' => 'Değerlendirmeniz alındı']);
    }

    public function editReview(Request $request){
        
        $review = Review::where(['user_id' => Auth::id(), 'book_id' => $request->book]);
        if(!$review->first()) return response()->json(['success'=>false, 'message'=>'Değerlendirme bulunamadı']); 
        
        $review->update(['rating' => $request->rating, 'review' => $request->review]);

        $book = Book::whereId($request->book)->with('publisher')->with('reviews')->first();
        
        return response()->json(['success'=>true, 'book'=>$book, 'message'=>'Değerlendirmeniz güncellendi.']);
    }



}
