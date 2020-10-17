<?php

namespace App\Classes;

class Work_with_db
{
    public function __construct()
    {
        $this->check();
    }

    private function check(){

        if(\DB::table('users')->exists() == false){

            return 'templates.home_view';

        }else{

            $this->check_year();

        }
    }

    private function check_year(){
        $years = new \App\Models\Years;

        $years = new \App\Models\Years;

        $user_id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        if(\App\Models\Years::whereRaw("year = ".date('Y')." and user_id = '{$user_id}'")->exists() != false){
            $this->check_mouth();
        }else{
            $years->user_id = $user_id;
                $years->year = date('Y');
                $years->save();

                $this->check_mouth();
        }
    }

    private function check_mouth(){
        $months = new \App\Models\Months;

        $user_id = \Auth::user()->id;

        $str_month = date('F');

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        if(\App\Models\Months::whereRaw("month = '{$str_month}' and user_id = '{$user_id}' and year_id = '{$id_year->id}'")->exists() != false){
            $this->check_day();
        }else{
            $months->user_id = $user_id;
            $months->year_id = $id_year->id;
            $months->month = $str_month;
            $months->save();

            $this->check_day();
        }
    }

    private function check_day(){
        $days = new \App\Models\Days;

        $user_id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

        $id_month = \DB::table('months')->select('id')->whereUser_idAndYear_idAndMonth($user_id, $id_year->id, date('F'))->first();

        if(\App\Models\Days::whereRaw("`numeric` = ".date('d')." and user_id = '{$user_id}' and year_id = '{$id_year->id}' and month_id = '{$id_month->id}'")->exists() != false){

            return true;

        }else{
            $days->user_id = $user_id;
            $days->year_id = $id_year->id;
            $days->month_id = $id_month->id;
            $days->numeric = date('d');
            $days->save();

            return true;
        }
    }

    public function add_limit_sum($sum){

        $id = \Auth::user()->id;

        $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($id, date('Y'))->first();

        $id_month = \DB::table('months')->select('id')->whereUser_idAndYear_idAndMonth($id, $id_year->id, date('F'))->first();

        $month = \App\Models\Months::find($id_month->id);

        if(($sum != NULL) && ($sum != 0)){

            $month->limit_amount = $sum;
            $month->save();
        }
    }

}
