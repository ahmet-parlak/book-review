<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookList;
use App\Models\BookLists;

class ListController extends Controller
{

    public function addBook(Request $request, $id, $book)
    {   
        $request->merge(['list'=>$id, 'book' =>$book]);
        return app('App\Http\Controllers\ListController')->addBook($request);
    }

    public function removeBook(Request $request, $id, $book)
    {
        $request->merge(['list'=>$id, 'book' =>$book]);
        return app('App\Http\Controllers\ListController')->removeBook($request);
    }


    public function store(Request $request)
    {
        return app('App\Http\Controllers\ListController')->addBook($request);
    }


    public function index()
    {
        $lists = BookLists::where('user_id', auth()->user()->id)->withCount('books')->get();
        return response()->json(['book_lists' => $lists]);
    }


    public function show($id)
    {
        $list = BookLists::where('user_id', auth()->user()->id)->where('id', $id)->with('books.book.publisher')->first();

        return $list ? response(['state' => 'success', 'list' => $list]) : response()->json(["error" => "List not found"], 404);
    }


    public function update(Request $request, $id)
    {
        $list = BookLists::whereId($id)->where('user_id', auth()->user()->id)->first();

        //if list exists
        if (!$list) {
            return response()->json(["state" => "error", "message" => "Bad request"], 200);
        }

        if ($request->list_name && !in_array($list->list_name, ['read', 'to read', 'currently reading'])) {
            $ls = BookLists::where('user_id', auth()->user()->id)->where('list_name', $request->list_name);
            //if the user does not have a list with the same name
            if ($ls->count() == 0) {
                $list->list_name = $request->list_name;
            } else {
                return response()->json(["state" => "error", "message" => "Bu isimde bir listeniz mevcut!"], 200);
            }
            
        }

        if ($request->status) {

            $list->status = $list->status == 'private' ? 'public' : 'private';
        }

        $list->save();


        return response()->json(["state" => "success", "list" => $list], 200);
    }




    public function destroy($id)
    {
        $list = BookLists::whereId($id)->where('user_id', auth()->user()->id);
        if ($list->count() && !in_array($list->first()->list_name, ['read', 'to read', 'currently reading'])) {
            $list->delete();
            return response()->json(["state" => "success", "message" => "Liste kaldırıldı"], 200);
        } else {
            return response()->json(["state" => "error", "message" => "Liste bulunamadı"], 200);
        }
    }
}
