<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller{
    
    public function index(){
        return view('admin.index');
    }

    public function post_add(){
        return view('admin.add_post');
    }

    public function tariff_add(){
        return view('admin.add_tariff');
    }

    public function feedback_show(){
        $feedbacks = DB::select('select * from feedback');
        return view('admin.feedback_show', ['feedbacks' => $feedbacks]);
    }

    public function tariff_show(){
        $tariffs = DB::select('select t.id, ta.name as tariff_name, t.user_name, t.user_phone, t.user_email, t.user_comment from reservetariff as t inner join tariffs as ta on ta.id=t.id_tarif');
        return view('admin.tariff_show', ['tariffs' => $tariffs]);
    }
}
