<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller{
    
    public function post_delete(Request $req, $post_id){
        DB::delete('DELETE FROM post WHERE id=?', [$post_id]);
        return redirect()->route('news-page');
    }

    public function tariff_delete(Request $req, $tariff_id){
        DB::delete('DELETE FROM tariffs WHERE id=?', [$tariff_id]);
        return redirect()->route('tariff-page');
    }

    public function tour_edit_deletephoto(Request $req, $id){
        $directory = 'images/'.$id.'/';
        $images = Storage::allFiles($directory);
        foreach($images as $image){
            Storage::delete($image);
        }
        return redirect()->route('admin-edit-tour', [$id]);
    }

    public function tour_delete(Request $req, $id){
        DB::delete('DELETE FROM tour WHERE id=?', [$id]);
        return redirect()->route('admin-index');
    }
}
