<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ReviewCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function create(ReviewCreateRequest $request)
    {
        Review::create(['user_id' => Auth::id(), 'book_id' => $request->book, 'rating' => $request->rating, 'review' => $request->review]);
        return redirect()->back()->withSuccess("Değerlendirmeniz alındı");
    }


    public function delete(Request $request)
    {
        if ($request->review) {

            $review = Review::whereId($request->review)->where('user_id', auth()->user()->id);

            if ($review->count()) {
                $book = $review->first()->book;
                $review->delete();

                /* If delete request came from edit-request page */
                $request_came_from =  $request->session()->get('_previous')['url'];
                $path = explode('/', $request_came_from);
                if (in_array("edit-review", $path)) {
                    return response()->json(["state" => "success", "message" => "review deleted", 'redirect' => route('mybooks')], 200);
                }

                return response()->json(["state" => "success", "message" => "review deleted"], 200);
            } else {
                return response()->json(["state" => "error", "message" => "review not found"], 200);
            }
        } else {
            return response()->json(["state" => "error", "message" => "missing inputs"], 200);
        }
    }


    public function edit($id)
    {
        $review = Review::whereId($id)->where('user_id', auth()->user()->id)->first() ?? abort(404, "DEĞERLENDİRME BULUNAMADI");
        return view('bookReview.edit-review', compact('review'));
    }

    public function update($id, Request $request)
    {
        $review = Review::whereId($id)->where('user_id', auth()->user()->id);
        $review->get() ?? abort(404);

        if ($request->review && $request->rating && in_array($request->rating, ['1', '2', '3', '4', '5'])) {
            $review->update(['rating' => $request->rating, 'review' => $request->review]);
            return back()->withSuccess("Değerlendirmeniz güncellendi");
        } else {
            return redirect()->back()->withErrors(['message' => "Hata"]);
        }
    }
}
