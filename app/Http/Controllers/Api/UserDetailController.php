<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\BookLists;
use App\Models\BookList;

class UserDetailController extends Controller
{
    public function show($id)
    {
        $user = User::find($id) ?? abort(404, "KULLANICI BULUNAMADI");
        $lists = BookLists::where('user_id', $id)->where('status', 'public')->withCount('books')->get();

        $data = ['user' => $user, 'lists' => $lists];
        return response()->json(["state" => "success", "data" => $data], 200);
    }

    public function reviews($id)
    {
        $reviews = Review::where('user_id', $id)->with('book')->simplePaginate(5);
        return response()->json(["state" => "success", "data" => $reviews], 200);
    }

    public function list($userId, $listId)
    {
        $list = BookLists::whereId($listId)->whereUserId($userId)->where('status', 'public')->first();

        if($list != null){

            $books = BookList::whereListId($listId)->with('book')->simplePaginate(10);
            $data = ['list' => $list, 'books' =>$books];

            return response()->json(["state" => "success", "data" => $data], 200); 
        }

        return response()->json(["state" => "error"], 404);
    }
}
