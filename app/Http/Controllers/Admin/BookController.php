<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereParent_id(null)->with('childrenAll')->get();
        $publishers = Publisher::get();
        $authors = Author::get();
        return view("admin.book.create", compact(['categories', 'publishers', 'authors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        //Book Photo Control
        if ($request->hasFile('book_photo')) {
            $photoName = md5($request->author_name) . rand(0, 100) . '.' . $request->book_photo->extension();
            $photoPath = "storage/books/" . $photoName;

            //Photo Save
            Image::make(request()->file('book_photo'))->save($photoPath);

            //Replace value of book_photo in form with file path
            $request->merge([
                'book_photo' => $photoPath
            ]);
        }

        $book = Book::create($request->post());
        BookAuthor::create(['book_id' => $book->id, 'author_id' => $request->author_id]);
        BookCategory::create(['book_id' => $book->id, 'category_id' => $request->category_id]);
        return redirect()->route('books.index')->withSuccess('Kitap eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
