<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        // dd($req);

        if($picture_data == null && $content_data == null){
            DB::update("UPDATE post SET title=?, date_update=? WHERE id=?",
            [$title, date('Y-m-d\TH:i'), $post_id]);
        }else if($picture_data == null){
            DB::update("UPDATE post SET title=?, content=?, date_update=? WHERE id=?",
            [$title, $content_data, date('Y-m-d\TH:i'), $post_id]);
        }else if($content_data == null){
            DB::update("UPDATE post SET title=?, picture=?, date_update=? WHERE id=?",
            [$title, $picture_data, date('Y-m-d\TH:i'), $post_id]);
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

    public function tour_edit(Request $req, $id){
        $tour = DB::select('select * from tour where id='.$id);
        if(count($tour)>0) $tour = $tour[0];
        else $tour = null;
        return view('admin.edit_tour', ['tour' => $tour]);
    }

    public function tour_edit_submit(Request $req, $id){
        $inputName = $req->input("inputName");
        $inputAddress = $req->input("inputAddress");
        $inputDateStart = $req->input("inputDateStart");
        $inputDays = $req->input("inputDays");
        $inputPrice1 = $req->input("inputPrice1");
        $inputPrice2 = $req->input("inputPrice2");
        $inputInPrice = $req->input("inputInPrice");
        $inputNotInPrice = $req->input("inputNotInPrice");
        $inputShortDescription = $req->input("inputShortDescription");
        $inputLongDescription = $req->input("inputLongDescription");
        $inputComplexity = $req->input("inputComplexity");
        $inputDiscount = $req->input("inputDiscount");
        $inputAdditionalInformation = $req->input("inputAdditionalInformation");

        DB::update("UPDATE tour SET name=?, address=?, date_start=?, days=?, price_1=?, price_2=?, in_price=?, not_in_price=?, short_description=?, long_description=?, complexity=?, isDiscount=?, additional_information=? WHERE id=?",
            [$inputName, $inputAddress, $inputDateStart, $inputDays, $inputPrice1, $inputPrice2, $inputInPrice, $inputNotInPrice, $inputShortDescription, $inputLongDescription, $inputComplexity, $inputDiscount, $inputAdditionalInformation, $id]);
        return redirect()->route('admin-edit-tour', $id);
    }

    public function tour_edit_submitphoto(Request $request, $id){
        if ($request->hasFile('inputPicture')) {
            $image      = $request->file('inputPicture');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = $image->openFile()->fread($image->getSize());
            // Storage::disk('local')->put('images/'.$id.'/'.$fileName, $img, 'public');
            Storage::put('images/'.$id.'/'.$fileName, $img, 'public');
        } 
        return redirect()->route('admin-edit-tour', [$id]);
    }

    public function tour_edit_add_route(Request $req, $id){
        $routes = DB::select('select * from tour_route where tour_id='.$id);
        return view('admin.edit_tour_add_route', ['routes' => $routes, 'tour_id' => $id]);
    }

    public function tour_edit_add_route_submit(Request $req, $id){
        $inputName = $req->input("inputName");
        $inputDescription = $req->input("inputDescription");

        DB::insert("insert into tour_route(tour_id, name, description) VALUES(?,?,?)", [$id, $inputName, $inputDescription]);

        return redirect()->route('admin-edit-tour-add-route', $id);
    }

    public function tour_edit_add_route_delete(Request $req, $id){
        $route_id = $req->input("inputId");

        DB::delete('delete from tour_route where id='.$route_id);

        return redirect()->route('admin-edit-tour-add-route', $id);
    }

    public function tour_edit_add_route_edit_submit(Request $req, $id){
        $route_id = $req->input("inputId");
        $inputName = $req->input("inputName");
        $inputDescription = $req->input("inputDescription");

        DB::update('update tour_route SET name=?, description=? WHERE id=?', [$inputName, $inputDescription, $route_id]);

        return redirect()->route('admin-edit-tour-add-route', $id);
    }
}
