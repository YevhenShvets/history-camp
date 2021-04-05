<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class TourController extends Controller{

    public function getAllTours(Request $req){
        $data = DB::select("select * from tour;");
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

        $search_creteria=$req->input('search');
        if($search_creteria){
            if($search_creteria == "popular"){
                $data = DB::select("select t.* from tour as t inner join tour_booking as tf on tf.tour_id=t.id group by tf.tour_id order by count(tf.id) desc;");
            }else if($search_creteria == "rating"){
                $data = DB::select("select t.* from tour as t inner join tour_feedback as tf on tf.tour_id=t.id group by tf.tour_id order by avg(tf.rating) desc;");
            }else if($search_creteria == "date"){
                $data = DB::select("select * from tour order by date_start desc;");
            }else {
                $data = DB::select('select * from tour where name like "%'.$search_creteria.'%";');
            }
        }

        return view('tour.all', ['data' => $data, "images" => $images, 'rating' => $rating]);
    }

    public function getAllToursSubmit(Request $req){
        $search_creteria = $req->input('search');
        return redirect()->route('tours-page', ['search'=>$search_creteria]);
    }

    public function getTour(Request $req, $id){
        $user_id = Auth::id();
        $is_feedback = null;
        $user = null;
        if($user_id){
            $user = DB::select('select id, name, email from users where id='.$user_id);
            if(count($user) > 0) $user = $user[0];
            else $user = null;
            $user_tour = DB::select('select * from tour_booking where user_email=? and tour_id=?', [$user->email, $id]);
            if($user_tour) $is_feedback = TRUE;
            // dd($user_tour);
        }

        $tour = DB::select("select * from tour where id=?", [$id]);
        $routes = null;
        if(count($tour)>0){
            $tour = $tour[0];
            $routes = DB::select("select * from tour_route where tour_id=?",[$tour->id]);
        } else $tour = null;

        $directory = 'images/'.$id.'/';
        $images = Storage::allFiles($directory);

        $feedbacks = DB::select('select * from tour_feedback where tour_id=?', [$id]);
        if(count($feedbacks) == 0) $feedbacks = null;
        return view('tour.view', ['tour'=> $tour, 'routes' => $routes, 'images' => $images, 'is_feedback' => $is_feedback, 'feedbacks' => $feedbacks, 'user' => $user]);
    }

    public function TourSubmit(Request $req, $id){
        $tour_id = $req->input("tour_id");
        $user_name = $req->input("user_name");
        $user_surname = $req->input("user_surname");
        $user_phone = $req->input("user_phone");
        $user_email = $req->input("user_email");
        $user_number_of_people = $req->input("user_number_of_people");

        DB::insert("INSERT INTO tour_booking(tour_id, user_name, user_surname, user_phone, user_email, user_number_of_people, date_create) VALUES(?, ?, ?, ?, ?, ?, ?)",
        [$tour_id, $user_name, $user_surname, $user_phone, $user_email, $user_number_of_people, date('Y-m-d H:i:s')]);
        return redirect()->route('tour-id-page', $id);
    }

    public function TourFeedback(Request $req, $id){
        $inputId = $req->input("inputId");
        $inputRating = $req->input("inputRating");
        $inputDescription = $req->input("inputDescription");
        DB::insert("INSERT INTO tour_feedback(tour_id, user_id, rating, description, date_create) VALUES(?, ?, ?, ?, ?)",
        [$id, $inputId, $inputRating, $inputDescription, date('Y-m-d H:i:s')]);
        return redirect()->route('tour-id-page', $id);
    }
}
