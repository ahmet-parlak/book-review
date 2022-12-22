<?php

namespace App\Http\Controllers;

use App\Models\BookLists; //Lists
use App\Models\BookList;  //Book in list
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function mylists()
    {
        $lists = BookLists::where('user_id', auth()->user()->id)->get();
        return view('bookReview.mylists', compact('lists'));
    }

    public function mylist($list)
    {
        $list = BookLists::where('user_id', auth()->user()->id)->where('list_name', $list)->with('books.book.publisher')->first();
        //return $list;
        return view('bookReview.mylist', compact('list'));
    }

    public function editName(Request $request)
    {

        return $request->input('name');
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
}
