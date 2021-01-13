<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller{


    public function getAll(Request $req){
        $data = DB::select('select * from test_table;');
        return view('news.all', ['data' => $data]);
    }
}
