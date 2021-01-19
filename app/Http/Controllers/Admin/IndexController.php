<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller{
    
    public function index(){
        return view('admin.index');
    }

    public function post_add(){
        return view('admin.add_post');
    }

    public function tariff_add(){
        return view('admin.add_tariff');
    }
}
