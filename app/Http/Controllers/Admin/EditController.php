<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class EditController extends Controller{


    public function post_edit(Request $req, $post_id){
        $post = DB::select('select * from post where id='.$post_id);
        if(count($post)>0) $post = $post[0];
        else $post = null;
        return view('admin.edit_post', ['post' => $post]);
    }

    public function post_edit_submit(Request $req, $post_id){
        $validator = Validator::make($req->all(), [
            'inputTitle' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin-edit-post',[$post_id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $title = $req->input("inputTitle");

        $content = $req->file("inputContent");
        if($content)
            $content_data = $content->openFile()->fread($content->getSize());
        else $content_data = NULL;

        $picture = $req->file("inputPicture");
        if($picture)
            $picture_data = $picture->openFile()->fread($picture->getSize());
        else $picture_data = NULL;

        if((!$content) && (!$picture)){
            DB::update("UPDATE post SET title=?, date_update=? WHERE id=?",
            [$title, date('Y-m-d\TH:i'), $post_id]);
        }else if(!$picture){
            DB::update("UPDATE post SET title=?, content=?, date_update=? WHERE id=?",
            [$title, $content_data, date('Y-m-d\TH:i'), $post_id]);
        }else{
            DB::update("UPDATE post SET title=?, content=?, picture=?, date_update=? WHERE id=?",
            [$title, $content_data, $picture_data, date('Y-m-d\TH:i'), $post_id]);
        }
        
        return redirect()->route('news-post', [$post_id]);
    }


    public function tariff_edit(Request $req, $tariff_id){
        $tariff = DB::select('select * from tariffs where id='.$tariff_id);
        if(count($tariff)>0) $tariff = $tariff[0];
        else $tariff = null;
        return view('admin.edit_tariff', ['tariff' => $tariff]);
    }

    public function tariff_edit_submit(Request $req, $tariff_id){
        $validator = Validator::make($req->all(), [
            'inputName' => 'required',
            'inputDateStart' => 'required',
            'inputDateEnd' => 'required',
            'inputPrice' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin-edit-tariff')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name = $req->input("inputName");
        $date_start = $req->input("inputDateStart");
        $date_end = $req->input("inputDateEnd");
        $price = $req->input("inputPrice");

        $description = $req->file("inputDescription");
        if($description)
            $description_data = $description->openFile()->fread($description->getSize());
        else $description_data = NULL;

        $picture = $req->file("inputPicture");
        if($picture)
            $picture_data = $picture->openFile()->fread($picture->getSize());
        else $picture_data = NULL;

        if((!$description) && (!$picture)){
            DB::update("UPDATE tariffs SET name=?, date_start=?, date_end=?, price=? WHERE id=?",
            [$name, $date_start, $date_end, $price, $tariff_id]);
        }else if(!$picture){
            DB::update("UPDATE tariffs SET name=?, date_start=?, date_end=?, price=?, description=? WHERE id=?",
            [$name, $date_start, $date_end, $price, $description_data, $tariff_id]);
        }else{
            DB::update("UPDATE tariffs SET name=?, date_start=?, date_end=?, price=?, description=?, picture=? WHERE id=?",
            [$name, $date_start, $date_end, $price, $description_data, $picture_data, $tariff_id]);
        }
        
        return redirect()->route('tariff-page');
    }
}
