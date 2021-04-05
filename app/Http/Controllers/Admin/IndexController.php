<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class IndexController extends Controller{
    
    public function index(){
        return view('admin.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
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

    public function feedback_show_submit(Request $req){
        $id = $req->input("ID");
        DB::update('update feedback set answered=? where id=?', [TRUE, $id]);
        return redirect()->route('admin-show-feedback');
    }

    public function tour_show(){
        $tours = DB::select('select tb.*, t.name as tname from tour_booking as tb inner join tour as t on t.id=tb.tour_id');
        return view('admin.tour_show', ['tours' => $tours]);
    }

    public function tariff_show(){
        $tariffs = DB::select('select t.id, ta.name as tariff_name, t.user_name, t.user_phone, t.user_email, t.user_comment from reservetariff as t inner join tariffs as ta on ta.id=t.id_tarif');
        return view('admin.tariff_show', ['tariffs' => $tariffs]);
    }


    public function tour_add(){
        return view('admin.add_tour');
    }


    public function login(Request $request)
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
          ]);

         if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
          {

            return redirect()->route('admin-index');
           }
          return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
