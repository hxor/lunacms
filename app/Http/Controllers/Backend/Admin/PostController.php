<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Illuminate\Support\Collection;

class PostController extends Controller
{

    private $bread;

    /**
     * Data For Breadcrumbs
     */
    public function __construct()
    {
        $this->bread = [
          'page-title' => 'All Posts',
          'menu' => 'Admin',
          'submenu' => 'Posts',
          'active' => 'All Posts'
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
        $posts = new Collection;
        if ($request->ajax()) {
            $dataPosts = Post::all();
            $no = 0;
            foreach ($dataPosts as $data) {
                $posts->push([
                    'id' => $data->id,
                    'title' => $data->title,
                    'author' => $data->user->name,
                    'published' => $data->published == 1 ? 'Published' : 'Unpublished',
                    'category' => $data->category_post
                    // 'created_at' => $data->created_at->format('d-m-Y H:m:s'),
                    // 'updated_at' => $data->updated_at->format('d-m-Y H:m:s'),
                ]);
            }
            return Datatables::of($posts)
                    ->addColumn('action', function($posts){
                        return view('layouts.backend.partials.datatable._action', [
                            'model' => $posts,
                            'form_url' => route('admin.post.destroy', $posts['id']),
                            'edit_url' => route('admin.post.edit', $posts['id']),
                            'show_url' => route('admin.post.show', $posts['id'])
                        ]);
                    })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Title'])
            ->addColumn(['data' => 'author', 'name' => 'author', 'title' => 'Author'])
            ->addColumn(['data' => 'published', 'name' => 'published', 'title' => 'Status'])
            ->addColumn(['data' => 'category', 'name' => 'category', 'title' => 'Category'])
            // ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created'])
            // ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>'false']);

        return view('main.backend.admin.post.index', compact('bread', 'html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bread = $this->bread;
        return view('main.backend.admin.post.create', compact('bread'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $data = [
            'user_id' => $request->user_id,
            'slug' => str_slug($request->title, '-'),
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'published' => $request->published
        ];

        $post = Post::create($data);
        $post->categories()->sync($request->get('category_lists'));

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Post successfully added',
        ]);

        return redirect()->route('admin.post.index');

        return $data = [
            'user_id' => $request->user_id,
            'slug' => str_slug($request->title, '-'),
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'published' => $request->published,
            'category_lists' => $request->get('category_lists')
        ];
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
        $bread = $this->bread;
        $post = Post::findOrFail($id);
        return view('main.backend.admin.post.edit', compact('bread', 'post'));
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
        // return $request->all();
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $data = [
            'user_id' => $request->user_id,
            'slug' => str_slug($request->title, '-'),
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'published' => $request->published
        ];

        $post = Post::findOrFail($id);
        $post->update($data);
        if (count($request->get('category_lists')) > 0) {
            $post->categories()->sync($request->get('category_lists'));
        } else {
            // No category set, detach all
            $post->categories()->detach();
        }

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Post successfully updated',
        ]);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Post::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Post successfully deleted',
        ]);

        return redirect()->route('admin.post.index');
    }
}
