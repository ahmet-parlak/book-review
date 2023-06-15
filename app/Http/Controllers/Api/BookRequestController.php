<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookRequest;

class BookRequestController extends Controller
{
    public function createBookRequest(Request $request)
    {
        /* Validation */
        $rules = [
            "isbn" => "required|numeric|digits:13|unique:App\Models\Book,isbn",
            "title" => "required|max:500",
            "author" => "nullable|max:500",
            "publisher" => "nullable|max:500"
        ];
        $messages = ['unique' => 'Bu :attribute sistemde zaten mevcut.'];
        $attributes = ['isbn' => 'ISBN', 'title' => 'Kitap Başlığı', 'author' => 'Yazar', 'publisher' => 'Yayınevi'];

        $request->validate($rules, $messages, $attributes);
        /* Validation */

        /* Duplicate Control */
        $book_request =  BookRequest::where('user_id', auth()->user()->id)->where('isbn', $request->input('isbn'));
        if ($book_request->count()) {
            return response()->json(["state" => "success", "message" => "Talebiniz alınmış."], 200);
        }
        /* Duplicate Control */

        /* Store */
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        BookRequest::create($request->except('_token'));
        /* Store */

        return response()->json(["state" => "success", "message" => "Talebiniz alındı."], 200);
    }
}
