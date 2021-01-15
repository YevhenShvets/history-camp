<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller{


    public function contacts(Request $req){
        return view('contact', ['data' => []]);
    }


    public function contactsPost(Request $req){
        $validator = Validator::make($req->all(), [
            'inputName' => 'required',
            'inputEmail' => 'required|email',
            'inputEmail' => 'required',
            'inputMessage' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact-page')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user_name = $req->input("inputName");
        $user_email = $req->input("inputEmail");
        $user_phone = $req->input("inputEmail");
        $user_message = $req->input("inputMessage");

        DB::insert("INSERT INTO feedback(date_create, user_name, user_email, user_phone, user_message, answered) VALUES(?, ?, ?, ?, ?, ?)",
        [date('Y-m-d h:i:s'), $user_name, $user_email, $user_phone, $user_message, false]);
        return redirect()->route('contact-page', ['toast' => true]);
    }
}
