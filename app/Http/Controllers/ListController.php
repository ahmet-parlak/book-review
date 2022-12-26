<?php

namespace App\Http\Controllers;

use App\Models\BookLists; //Lists
use App\Models\BookList;  //Book in list
use App\Models\Book;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function mylists()
    {
        $lists = BookLists::where('user_id', auth()->user()->id)->get();
        return view('bookReview.mylists', compact('lists'));
    }

    public function mylist($id, $name)
    {
        $list = BookLists::where('user_id', auth()->user()->id)->where('id', $id)->with('books.book.publisher')->first() ?? abort(404, "LİSTE BULUNAMADI");
        return view('bookReview.mylist', compact('list'));
    }

    public function editName(Request $request)
    {
        if (strlen($request->input('listName')) >= 3) {
            $list = BookLists::whereId($request->input('list'))->where('user_id', auth()->user()->id);
            if ($list->count()) {
                $ls = BookLists::where('user_id', auth()->user()->id)->where('list_name', $request->input('listName'));
                //if the user does not have a list with the same name
                if ($ls->count() == 0) {
                    $list->update(['list_name' => $request->input('listName')]);
                    return response()->json(["state" => "success", "message" => "Liste başlığı güncellendi."], 200);
                } else {
                    return response()->json(["state" => "error", "message" => "Bu isimde bir listeniz mevcut!"], 200);
                }
            } else {
                return response()->json(["state" => "error", "message" => "Liste bulunamadı"], 200);
            }
        } else {
            return response()->json(["state" => "error", "message" => "Bad request"], 200);
        }
    }

    public function editState(Request $request)
    {
        $list = BookLists::whereId($request->input('list'))->where('user_id', auth()->user()->id);
        if ($list->count() == 1 && in_array($request->input('state'), ['public', 'private'])) {

            $list->update(['status' => $request->input('state')]);
            return response()->json(["state" => "success", "message" => ""], 200);
        }
        return response()->json(["state" => "error", "message" => "Bad request"], 200);
    }

    public function removeBook(Request $request)
    {
        $list = BookLists::whereId($request->input('list'))->where('user_id', auth()->user()->id);
        if ($list->count() == 1) {

            $booklist = BookList::where('list_id', $request->input('list'))->where('book_id', $request->input('book'));

            if ($booklist->count()) {
                $booklist->delete();
            }

            return response()->json(["state" => "success", "message" => ""], 200);
        }
        return response()->json(["state" => "error", "message" => "Bad request"], 200);
    }

    public function addBook(Request $request)
    {
        $list_id = $request->input('list');
        $list_name = $request->input('list_name');
        $book_id = $request->input('book');
        $user_id = auth()->user()->id;

        if (!Book::whereId($book_id)->first()) {
            return response()->json(["state" => "error", "message" => "Book not found"], 200);
        }

        if ($list_id) {
            $bookList = BookLists::whereId($list_id)->where('user_id', $user_id);
            if ($bookList->count()) {
                if (BookList::where(['list_id' => $list_id, 'book_id' => $book_id])->count()) {
                    return response()->json(["state" => "success", "message" => "Kitap bu listeye zaten eklenmiş"], 200);
                }
                BookList::Create(['list_id' => $list_id, 'book_id' => $book_id]);

                /* Listeye eklenen kitap read, to read ve currently reading listelerinden sadece birinde bulunabilir
                /* Kitap, bu üc listeden birine eklendiyse diger listeden kaldirilmali */
                $lsits = BookLists::where('user_id', $user_id)->whereNot('id', $list_id)->where(function ($query) {
                    $query->where('list_name', 'read')
                        ->orWhere('list_name', 'to read')
                        ->orWhere('list_name', 'currently reading');
                })->with(["books" => function ($q) use ($book_id) {
                    $q->where('book_id', '=', $book_id);
                }])->get();
                foreach ($lsits as $list) {
                    foreach ($list->books as $book) {
                        $book->delete();
                    }
                }
                return response()->json(["state" => "success", "message" => "Kitap listeye eklendi."], 200);
            }
        }

        if ($list_name) {
            $list = BookLists::firstOrCreate(['user_id' => $user_id, 'list_name' => $list_name]);
            if ($list->wasRecentlyCreated) {
                BookList::create(['list_id' => $list->id, 'book_id' => $book_id]);
                return response()->json(["state" => "success", "message" => "Liste oluşturuldu ve kitap eklendi.", "newlist" => "true", "list" => $list->id], 200);
            } elseif (BookList::where(['list_id' => $list->id, 'book_id' => $book_id])->count()) {
                return response()->json(["state" => "success", "message" => "Kitap bu listeye zaten eklenmiş"], 200);
            } else {
                BookList::create(['list_id' => $list->id, 'book_id' => $book_id]);
                return response()->json(["state" => "success", "message" => "Kitap listeye eklendi."], 200);
            }
        }
        return response()->json(["state" => "error", "message" => "Bad request"], 200);
    }

    public function deleteList(Request $request)
    {
        $list = BookLists::whereId($request->list)->where('user_id', auth()->user()->id);
        if ($list->count() && !in_array($list->first()->list_name, ['read', 'to read', 'currently reading'])) {
            $list->delete();
            return response()->json(["state" => "success", "message" => "Liste kaldırıldı"], 200);
        } else {
            return response()->json(["state" => "error", "message" => "Liste bulunamadı"], 200);
        }
    }
}
