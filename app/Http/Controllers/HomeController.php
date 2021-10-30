<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
      //  $this->middleware('verified');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    $user=auth()->user();
        $course=Course::All();
        $orders=auth()->user()->orders;
        $carts=$orders->transform( function($cart,$key){
            return unserialize($cart->cart);
        });
        if($user->account_type=="professor"){
        return view('teacher\dashboardTeacher');
    }
        return view('studiant\dashboardStudiant')->with(['Courses'=>$course,'carts'=>$carts]);
    }
}
