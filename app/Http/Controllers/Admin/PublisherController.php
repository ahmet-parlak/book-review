<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Http\Requests\PublisherCreateRequest;
use App\Http\Requests\PublisherUpdateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('admin.publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.publisher.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherCreateRequest $request)
    {
        
        //Publisher Photo Control
        if ($request->hasFile('publisher_photo')) {
            $photoName = md5($request->publisher_name) . rand(0, 100) . '.' . $request->publisher_photo->extension();
            $photoPath = "storage/publishers/" . $photoName;

            //Photo Save
            Image::make(request()->file('publisher_photo'))->save($photoPath);

            //Replace value of publisher_photo in form with file path
            $request->merge([
                'publisher_photo' => $photoPath
            ]);
        }

        Publisher::create($request->post());
        return redirect()->route('publishers.index')->withSuccess('Yayınevi eklendi.');
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
        $publisher = Publisher::find($id) ?? abort(404, 'Yayınevi Bulunamadı');

        return view("admin.publisher.edit", compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherUpdateRequest $request, $id)
    {
        $publisher = Publisher::find($id) ?? abort(404, 'Yayınevi Bulunamadı');


        //Publisher Photo Control
        $photoPath = $publisher->publisher_photo;

        if ($request->hasFile('publisher_photo')) {

            //Delete old photo from storage
            if ($photoPath) {
                File::delete($publisher->publisher_photo);
                //Storage::delete(asset('/') . $publisher->publisher_photo);
            }

            $photoName = md5($request->publisher_name) . rand(0, 100) . '.' . $request->publisher_photo->extension();
            $photoPath = "storage/publishers/" . $photoName;

            //Photo Save
            Image::make(request()->file('publisher_photo'))->save($photoPath);

            //Replace value of publisher_photo in form with file path
            $request->merge([
                'publisher_photo' => $photoPath
            ]);
        }

        /* Manipulate post values (photo path) */
        $values = $request->except(['_method', '_token']);
        $values['publisher_photo'] = $photoPath;

        Publisher::whereId($id)->update($values);
        return redirect()->route('publishers.edit', $id)->withSuccess('Yayınevi düzenlendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id) ?? abort(404, 'Yayınevi Bulunamadı');
        $publisher->delete();
        return redirect()->route('publishers.index')->withSuccess('Yayınevi kaldırıldı.');
    }
}
