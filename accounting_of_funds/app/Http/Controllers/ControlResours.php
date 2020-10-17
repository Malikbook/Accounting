<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlResours extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Auth::user() == null){

            return view('templates.home_view');

        }else if(new \App\Classes\Work_with_db == true){

            return view('templates.home_view', ['results' => \App\Classes\Sample_by_user::sample()]);

        }else{

            abort( response(' <div style="color: red; width: 100%; vertical-align: middle; padding-top: 100px; text-align: center;"><h1>No Content (ERR code: 204)</h1></div> ', 204 ) );
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.create_cost');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function created(Request $request)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            $req = (object) [
                'title' => $request['title'],
                'amount' => (float) $request['amount'],
                'desc' => $request['desc']
            ];

            return view('templates.home_view', ['results' => \App\Classes\Sample_by_user::sample(),
            'req' => new \App\Classes\Add_amount($req)]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view(new \App\Classes\Work_with_db);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.all_years', [ 'results' => \App\Classes\Show_all_records::select_years() ]);
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_mail()
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.create_mail');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_months($id)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.all_months', [ 'results' => \App\Classes\Show_all_records::select_months($id) ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_days($id)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.all_days', [ 'results' => \App\Classes\Show_all_records::select_days($id) ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_costs($id)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            return view('templates.all_costs', [ 'results' => \App\Classes\Show_all_records::select_costs($id) ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{

            $new_values = (object) [
                'name' => $request['new_name'],
                'email' => $request['email'],
            ];

            new \App\Classes\Edit_account($new_values);

            return view('user_home', ['add_limit' => 'flase']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{

            $sum = (float) $request['sum'];

            $add = new \App\Classes\Work_with_db;
            $add->add_limit_sum($sum);

            return view('user_home', ['add_limit' => 'flase']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user() == null){

            return view('templates.home_view');

        }else{
            \DB::delete('delete from users where id = ?',[$id]);

            return view('templates.home_view');
        }
    }
}
