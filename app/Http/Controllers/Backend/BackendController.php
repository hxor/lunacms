<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    private $bread;

    public function __construct()
    {
        $this->bread = [
          'page-title' => 'Dashboard',
          'menu' => 'Home',
          'submenu' => 'Pages',
          'active' => 'Dashboard'
        ];
    }

    public function index(){
      $bread = $this->bread;
      return view('main.backend.index', compact('bread'));
    }
}
