<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Category::whereParent_id(null)->with('childrenAll')->get();

        $categories = Category::whereParent_id(null)->with('childrenAll')->paginate(5);
        //return $categories;
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereParent_id(null)->with('childrenAll')->get();
        return view("admin.category.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->post());
        return redirect()->route('categories.index')->withSuccess('Kategori eklendi.');
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
        $editCategory = Category::whereId($id)->with('parent')->first() ?? abort(404, 'Kategori Bulunamadı');
        $categories = Category::whereParent_id(null)->whereNot('id', $editCategory->id)->with('childrenAll')->get();
        
        return view("admin.category.edit", compact(['editCategory', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        Category::find($id) ?? abort(404, 'Kategori Bulunamadı');

        Category::whereId($id)->update($request->except(['_method', '_token']));
        return redirect()->route('categories.edit', $id)->withSuccess('Kategori güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Category::find($id) ?? abort(404, 'Kategori Bulunamadı');
        $publisher->delete();
        return redirect()->route('categories.index')->withSuccess('Kategori kaldırıldı.');
    }
}
