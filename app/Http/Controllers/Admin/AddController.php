<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddController extends Controller{


    public function post_add_submit(Request $req){
        $validator = Validator::make($req->all(), [
            'inputTitle' => 'required',
            'inputContent' => 'required',
            'inputDateCreate' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin-add-post')
                        ->withErrors($validator)
                        ->withInput();
        }
        $title = $req->input("inputTitle");
        $content = $req->file("inputContent");
        $content_data = $content->openFile()->fread($content->getSize());
        $picture = $req->file("inputPicture");
        if($picture)
            $picture_data = $picture->openFile()->fread($picture->getSize());
        else $picture_data = NULL;
        $date_create = $req->input("inputDateCreate");

        DB::insert("INSERT INTO post(title, content, picture, date_create, date_update) VALUES(?, ?, ?, ?, ?)",
        [$title, $content_data, $picture_data, $date_create, $date_create]);

        $id = DB::select('select id from post where title=? and date_create=?', [$title, $date_create])[0]->id;
        return redirect()->route('news-post', [$id]);
    }

    public function tariff_add_submit(Request $req){
        $validator = Validator::make($req->all(), [
            'inputName' => 'required',
            'inputDateStart' => 'required',
            'inputDateEnd' => 'required',
            'inputPrice' => 'required',
            'inputDescription' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin-add-tariff')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name = $req->input("inputName");
        $date_start = $req->input("inputDateStart");
        $date_end = $req->input("inputDateEnd");
        $price = $req->input("inputPrice");

        $description = $req->file("inputDescription");
        $description_data = $description->openFile()->fread($description->getSize());

        $picture = $req->file("inputPicture");
        if($picture)
            $picture_data = $picture->openFile()->fread($picture->getSize());
        else $picture_data = NULL;

        DB::insert("INSERT INTO tariffs(name, date_start, date_end, price, description, picture) VALUES(?, ?, ?, ?, ?, ?)",
        [$name, $date_start, $date_end, $price, $description_data, $picture_data]);
        return redirect()->route('tariff-page');
    }


    public function tour_add_submit(Request $req){
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
        

        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tour(name, address, date_start, days, price_1, price_2, in_price, not_in_price, short_description, long_description, complexity, isDiscount, additional_information) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [$inputName, $inputAddress, $inputDateStart, $inputDays, $inputPrice1, $inputPrice2, $inputInPrice, $inputNotInPrice, $inputShortDescription, $inputLongDescription, $inputComplexity, $inputDiscount, $inputAdditionalInformation]);    
            $id = DB::select("SELECT LAST_INSERT_ID() as id;");
            DB::commit();
            return redirect()->route('admin-edit-tour', $id[0]->id);
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->route('admin-index');
    }
}
