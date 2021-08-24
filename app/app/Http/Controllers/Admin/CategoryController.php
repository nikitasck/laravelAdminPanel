<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catergory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Catergory::orderBy('created_at', 'asc')->get(); //Получаем отсортированные по дате создание(новые первые) категории из бд

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new Catergory();
        $new_category->title = $request->title;
        $new_category->save();

        return redirect('/admin_panel/category')->withSuccess('New category successed created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function show(Catergory $catergory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catergory $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catergory $category)
    {
        $category->title = $request->title;
        $category->save();

        return redirect('/admin_panel/category')->withSuccess('Category was changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catergory  $catergory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catergory $category)
    {
        $category->delete();
        return redirect('/admin_panel/category')->withSuccess('Category was successfuly deleted');
    }
}
