<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        // $popular_tours = DB::select('select t.* from tour as t inner join tour_feedback as tf on tf.tour_id=t.id group by tf.tour_id order by avg(tf.rating) desc;');
        $data = DB::select('select t.* from tour as t inner join tour_booking as tf on tf.tour_id=t.id group by tf.tour_id order by count(tf.id) desc LIMIT 10;');
        // dd($popular_tours);
        $images = [];
        $rating = [];
        for($i=0;$i<count($data); $i++){
            $directory = 'images/'.$data[$i]->id.'/';
            $img = Storage::allFiles($directory);
            if(count($img) > 0){
                $images[$data[$i]->id] = $img[0];
            }
            $rat = DB::select('select avg(rating) as a from tour_feedback where tour_id=?', [$data[$i]->id]);
            if(count($rat) > 0){
                $rating[$data[$i]->id] = (int)$rat[0]->a;
            }
        }

        $news = DB::select('select id, title, picture,  date_create, date_update from post order by date_create desc LIMIT 5;');
        return view('home', ['data' => $data, "images" => $images, 'rating' => $rating, 'news' => $news]);
        // return redirect()->route('news-page');
    }

    public function user_home(Request $req){
        $id = Auth::id();

        $user = DB::select('select id, name, email from users where id='.$id);
        if(count($user) > 0){
            $user = $user[0];
            $tours = DB::select('select tb.*, t.name as tname from tour_booking as tb inner join tour as t on t.id=tb.tour_id where tb.user_email=?', [$user->email]);
            $feedbacks = DB::select('select t.name, tf.* from tour_feedback as tf inner join tour as t on t.id=tf.tour_id where user_id=?', [$user->id]);
        } 
        else{
            $user = null;
            $tours = null;
            $feedbacks = null;
        } 

        return view('user.home', ['tours' => $tours, 'feedbacks' => $feedbacks, 'user' => $user]);
    }
}
