<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;

class Mailsend extends Controller
{
    public function mailsend(Request $request){

        $details =[
            'title' => $request['title'],
            'email' => $request['email'],
            'descr' => $request['desc']
        ];



        \Mail::to('oleksey201417@gmail.com')->send(new SendMail($details));
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else if(new \App\Classes\Work_with_db == true){

            return view('templates.home_view', ['results' => \App\Classes\Sample_by_user::sample()]);

        }else{

            abort( response(' <div style="color: red; width: 100%; vertical-align: middle; padding-top: 100px; text-align: center;"><h1>No Content (ERR code: 204)</h1></div> ', 204 ) );
        }
    }
}
