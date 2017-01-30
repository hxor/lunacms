<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class CategoryController extends Controller
{
    private $bread;

    /**
     * Data For Breadcrumbs
     */
    public function __construct()
    {
        $this->bread = [
          'page-title' => 'Category',
          'menu' => 'Admin',
          'submenu' => 'Posts',
          'active' => 'Category'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {

        $bread = $this->bread;

        if ($request->ajax()) {
          $categories = Category::select(['id', 'title', 'slug', 'parent_id']);
          return Datatables::of($categories)
                  ->addColumn('action', function($category){
                      return view('layouts.backend.partials.datatable._action', [
                          'model' => $category,
                          'form_url' => route('admin.category.destroy', $category->id),
                          'edit_url' => route('admin.category.edit', $category->id),
                          'show_url' => route('admin.category.show', $category->id)
                      ]);
                  })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Title'])
            ->addColumn(['data' => 'slug', 'name' => 'slug', 'title' => 'Slug'])
            ->addColumn(['data' => 'parent_id', 'name' => 'parent_id', 'title' => 'Parent ID'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>'false']);

        return view('main.backend.admin.category.index', compact('bread', 'html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:categories',
            'parent_id' => 'exists:categories,id'
        ]);

        Category::create([
          'title' => $request->title,
          'parent_id' => $request->has('parent_id') ? $request->input('parent_id') : NULL,
          'slug' => str_slug($request->title, '-')
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Category successfully added',
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('main.backend.admin.category.edit', compact('category'));
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
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:categories,title,'. $id,
            'parent_id' => 'exists:categories,id'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
          'title' => $request->title,
          'parent_id' => $request->has('parent_id') ? $request->input('parent_id') : NULL,
          'slug' => str_slug($request->title, '-')
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Category successfully updated',
        ]);

        return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (!Category::destroy($id)) return redirect()->back();

      notify()->flash('Done!', 'success', [
          'timer' => 1500,
          'text' => 'Category successfully deleted',
      ]);

      return redirect()->route('admin.category.index');
    }
}
