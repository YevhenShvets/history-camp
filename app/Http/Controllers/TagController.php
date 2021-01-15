<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller{

    public function getAllTags(Request $req){
        $data = DB::select("select tags.name, COUNT(post_tags.id_post) as post_count from tags  left join post_tags on tags.id=post_tags.id_tag group by tags.id;");
        return view('tag.all', ['data' => $data]);
    }

    public function getTagPosts(Request $req, $name){
        $posts = DB::select('select * from post inner join post_tags on post_tags.id_post=post.id inner join tags on tags.id=post_tags.id_tag where tags.name=?', [$name]);
        if(count($posts)==0) $posts = null;
        return view('tag.posts', ['posts' => $posts]);
    }
}
