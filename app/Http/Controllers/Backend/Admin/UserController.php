<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class UserController extends Controller
{

    private $bread;

    /**
     * Data For Breadcrumbs
     */
    public function __construct()
    {
        $this->bread = [
          'page-title' => 'Users',
          'menu' => 'Admin',
          'submenu' => 'Settings',
          'active' => 'Users'
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
          $users = User::select(['id', 'name', 'email', 'role', 'created_at']);
          return Datatables::of($users)
                  ->addColumn('action', function($user){
                      return view('layouts.backend.partials.datatable._action', [
                          'model' => $user,
                          'form_url' => route('admin.user.destroy', $user->id),
                          'edit_url' => route('admin.user.edit', $user->id),
                          'show_url' => route('admin.user.show', $user->id)
                      ]);
                  })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'role', 'name' => 'role', 'title' => 'Role'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>'false']);

        return view('main.backend.admin.user.index', compact('bread', 'html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bread = $this->bread;
        $role = [
            'admin' => 'Admin', 
            'author' => 'Author',
            'contributor' => 'Contributor'
        ];
        return view('main.backend.admin.user.create', compact('role', 'bread'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'role' => 'in:admin,author,contributor',
        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'active' => $request->active,
            'photo' => $request->has('photo') ? $request->input('photo') : '/photos/users/avatar.png'
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully added',
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bread = $this->bread;
        $user = User::findOrFail($id);
        return view('main.backend.admin.user.show', compact('user', 'bread'));
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
        $role = [
            'admin' => 'Admin', 
            'author' => 'Author',
            'contributor' => 'Contributor'
        ];
        $user =User::findOrFail($id);
        return view('main.backend.admin.user.edit', compact('role', 'user', 'bread'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'. $id,
            'role' => 'in:admin,author,contributor',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->has('password') ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
            'active' => $request->active,
            'photo' => $request->has('photo') ? $request->input('photo') : '/photos/users/avatar.png'
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully updated',
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!User::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully deleted',
        ]);

        return redirect()->route('admin.user.index');
    }
}
