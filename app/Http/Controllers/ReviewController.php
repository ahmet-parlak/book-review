<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ReviewCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(ReviewCreateRequest $request)
    {
        Review::create(['user_id' => Auth::id(), 'book_id' => $request->book, 'rating' => $request->rating, 'review' => $request->review]);
        return back()->withSuccess("succsess");
    }


    public function delete(Request $request)
    {
        if ($request->review) {

            $review = Review::whereId($request->review)->where('user_id', auth()->user()->id);

            if ($review->count()) {

                $review->delete();
                return response()->json(["state" => "success", "message" => "review deleted"], 200);
            } else {
                return response()->json(["state" => "error", "message" => "review not found"], 200);
            }
        } else {
            return response()->json(["state" => "error", "message" => "missing inputs"], 200);
        }
    }
}
