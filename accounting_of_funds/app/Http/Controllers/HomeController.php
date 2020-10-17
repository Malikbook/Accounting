<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(\App\Classes\Show_all_records::check_month_limit_amount() != null){
            return view('user_home', ['add_limit' => 'flase']);
        }else{
            return  view('user_home', ['add_limit' => 'this']);
        }
    }
}
