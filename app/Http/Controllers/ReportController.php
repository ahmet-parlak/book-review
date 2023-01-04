<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReport;
use App\Models\Book;

class ReportController extends Controller
{
    public function reportBook(Request $request)
    {

        //If book exists
        $book = Book::find($request->input('book'));
        if (!$book) {
            return response()->json(["state" => "error", "message" => "Kitap bulunamadı"], 200);
        }

        $user = auth()->user()->id;
        $report = BookReport::firstOrNew(['user_id' => $user, 'book_id' => $request->input('book')]);

        foreach ($request->reports as $input) {
            $attribute = $input['name'];
            $report->$attribute = "reported";
        }
        $report->save();

        return response()->json(["state" => "success", "title" => "Hatalar Rapor Edildi", "message" => "BookReview'in gelişmesinde katkıda bulunduğunuz için teşekkürler!"], 200);
    }
}
