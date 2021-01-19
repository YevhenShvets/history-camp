<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DeleteController extends Controller{
    
    public function post_delete(Request $req, $post_id){
        DB::delete('DELETE FROM post WHERE id=?', [$post_id]);
        return redirect()->route('news-page');
    }

    public function tariff_delete(Request $req, $tariff_id){
        DB::delete('DELETE FROM tariffs WHERE id=?', [$tariff_id]);
        return redirect()->route('tariff-page');
    }
}
