<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReport;
use App\Models\AuthorReport;
use App\Models\PublisherReport;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;

class ReportController extends Controller
{
    public function reportBook(Request $request)
    {
        $book_id = $request->input('report_data');
        //If book exists
        $book = Book::find($book_id);
        if (!$book) {
            return response()->json(["state" => "error", "message" => "Kitap bulunamadı"], 200);
        }

        $user = auth()->user()->id;
        $report = BookReport::firstOrNew(['user_id' => $user, 'book_id' => $book_id]);

        foreach ($request->reports as $input) {
            $attribute = $input['name'];
            $report->$attribute = "reported";
        }
        $report->save();

        return response()->json(["state" => "success", "title" => "Hatalar Rapor Edildi", "message" => "BookReview'in gelişmesinde katkıda bulunduğunuz için teşekkürler!"], 200);
    }


    public function reportAuthor(Request $request)
    {
        $author_id = $request->input('report_data');
        //If author exists
        $author = Author::find($author_id);
        if (!$author) {
            return response()->json(["state" => "error", "message" => "Yazar bulunamadı"], 200);
        }

        $user = auth()->user()->id;
        $report = AuthorReport::firstOrNew(['user_id' => $user, 'author_id' => $author_id]);

        foreach ($request->reports as $input) {
            $attribute = $input['name'];
            $report->$attribute = "reported";
        }
        $report->save();

        return response()->json(["state" => "success", "title" => "Hatalar Rapor Edildi", "message" => "BookReview'in gelişmesinde katkıda bulunduğunuz için teşekkürler!"], 200);
    }


    public function reportPublisher(Request $request)
    {
        $publisher_id = $request->input('report_data');
        //If publisher exists
        $publisher = publisher::find($publisher_id);
        if (!$publisher) {
            return response()->json(["state" => "error", "message" => "Yayınevi bulunamadı"], 200);
        }

        $user = auth()->user()->id;
        $report = publisherReport::firstOrNew(['user_id' => $user, 'publisher_id' => $publisher_id]);

        foreach ($request->reports as $input) {
            $attribute = $input['name'];
            $report->$attribute = "reported";
        }
        $report->save();

        return response()->json(["state" => "success", "title" => "Hatalar Rapor Edildi", "message" => "BookReview'in gelişmesinde katkıda bulunduğunuz için teşekkürler!"], 200);
    }
}
