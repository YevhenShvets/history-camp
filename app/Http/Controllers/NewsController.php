<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller{


    public function getAll(Request $req){
        $data = DB::select('select id, title, date_create, date_update from post;');
        return view('news.all', ['data' => $data]);
    }


    public function getPost(Request $req, $post_id){
        $post = DB::select('select * from post where id='.$post_id);
        if(count($post)>0) $post = $post[0];
        else $post = null;
        return view('news.post', ['post' => $post]);
    }
}
