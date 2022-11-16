<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Author;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(5);
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.author.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorCreateRequest $request)
    {
        //Author Photo Control
        if ($request->hasFile('author_photo')) {
            $photoName = md5($request->author_name) . rand(0, 100) . '.' . $request->author_photo->extension();
            $photoPath = "storage/authors/" . $photoName;

            //Photo Save
            Image::make(request()->file('author_photo'))->save($photoPath);

            //Replace value of author_photo in form with file path
            $request->merge([
                'author_photo' => $photoPath
            ]);
        }

        Author::create($request->post());
        return redirect()->route('authors.index')->withSuccess('Yazar eklendi.');
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
        $author = Author::find($id) ?? abort(404, 'Yazar Bulunamadı');

        return view("admin.author.edit", compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, $id)
    {
        $author = Author::find($id) ?? abort(404, 'Yazar Bulunamadı');


        //Author Photo Control
        $photoPath = $author->author_photo;

        if ($request->hasFile('author_photo')) {

            //Delete old photo from storage
            if ($photoPath) {
                File::delete($author->author_photo);
                //Storage::delete(asset('/') . $author->author_photo);
            }

            $photoName = md5($request->author_name) . rand(0, 100) . '.' . $request->author_photo->extension();
            $photoPath = "storage/authors/" . $photoName;

            //Photo Save
            Image::make(request()->file('author_photo'))->save($photoPath);

            //Replace value of author_photo in form with file path
            $request->merge([
                'author_photo' => $photoPath
            ]);
        }

        /* Manipulate post values (photo path) */
        $values = $request->except(['_method', '_token']);
        $values['author_photo'] = $photoPath;

        Author::whereId($id)->update($values);
        return redirect()->route('authors.edit', $id)->withSuccess('Yazar bilgileri güncellendi.');
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
