<?php

namespace App\Classes;

class Add_amount
{
    private $request;

    public function __construct($request){
        $this->req = $request;
        $this->check();
    }


    private function check(){

        if(\DB::table('users')->exists() == false){

            return 'templates.home_view';

        }else{

            $this->go_year();

        }
    }

    private function go_year(){
        $years = new \App\Models\Years;

        $years = new \App\Models\Years;

        $user_id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        if(\App\Models\Years::whereRaw("year = ".date('Y')." and user_id = '{$user_id}'")->exists() != false){
            $this->go_mouth();
        }else{
            $years->user_id = $user_id;
                $years->year = date('Y');
                $years->save();

                $this->go_mouth();
        }
    }

    private function go_mouth(){
        $months = new \App\Models\Months;

        $user_id = \Auth::user()->id;

        $str_month = date('F');

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        if(\App\Models\Months::whereRaw("month = '{$str_month}' and user_id = '{$user_id}' and year_id = '{$id_year->id}'")->exists() != false){
            $this->go_day();
        }else{
            $months->user_id = $user_id;
            $months->year_id = $id_year->id;
            $months->month = $str_month;
            $months->save();

            $this->go_day();
        }
    }

    private function go_day(){
        $days = new \App\Models\Days;

        $user_id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        $id_month = \DB::table('months')->select('id')->whereUser_idAndYear_idAndMonth($user_id, $id_year->id, date('F'))->first();

        if(\App\Models\Days::whereRaw("`numeric` = ".date('d')." and user_id = '{$user_id}' and year_id = '{$id_year->id}' and month_id = '{$id_month->id}'")->exists() != false){

            $this->add_cost();

        }else{
            $days->user_id = $user_id;
            $days->year_id = $id_year->id;
            $days->month_id = $id_month->id;
            $days->numeric = date('d');
            $days->save();

            $this->add_cost();
        }
    }

    private function add_cost(){

        $new_cost = new \App\Models\Costs;

        $num = (int) date('d');

        $user_id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        $id_month = \DB::table('months')->select('id')->whereUser_idAndYear_idAndMonth($user_id, $id_year->id, date('F'))->first();

        $id_day = \DB::table('days')->select('id')->whereUser_idAndYear_idAndMonth_idAndNumeric($user_id, $id_year->id, $id_month->id, $num)->first();

        if($this->req->desc == null){

            $new_cost->user_id = $user_id;
            $new_cost->year_id = $id_year->id;
            $new_cost->month_id = $id_month->id;
            $new_cost->day_id = $id_day->id;
            $new_cost->title = $this->req->title;
            $new_cost->cost_amount = $this->req->amount;
            $new_cost->save();

        }else{

            $new_cost->user_id = $user_id;
            $new_cost->year_id = $id_year->id;
            $new_cost->month_id = $id_month->id;
            $new_cost->day_id = $id_day->id;
            $new_cost->title = $this->req->title;
            $new_cost->cost_amount = $this->req->amount;
            $new_cost->description = $this->req->desc;
            $new_cost->save();
        }
    }

}
