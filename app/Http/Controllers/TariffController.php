<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TariffController extends Controller{


    public function getTariffs(Request $req){
        $data = DB::select('select * from tariffs;');
        return view('tariffs', ['data' => $data]);
    }

    public function tariffsPost(Request $req){
        $validator = Validator::make($req->all(), [
            'tariff-id' => 'required',
            'user-name' => 'required',
            'user-email' => 'required|email',
            'user-phone' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tariff-page')
                        ->withErrors($validator)
                        ->withInput();
        }
        $tariff_id = $req->input("tariff-id");
        $user_name = $req->input("user-name");
        $user_email = $req->input("user-email");
        $user_phone = $req->input("user-phone");
        $user_message = $req->input("message-text");

        DB::insert("INSERT INTO reservetariff(id_tarif, user_name, user_phone, user_email, user_comment) VALUES(?, ?, ?, ?, ?)",
        [$tariff_id, $user_name, $user_phone, $user_email, $user_message]);
        return redirect()->route('tariff-page', ['toast' => true]);
    }
}
