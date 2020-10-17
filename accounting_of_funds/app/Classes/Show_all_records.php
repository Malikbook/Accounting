<?php

namespace App\Classes;

class Show_all_records
{

    public static function select_years(){
        $user_id = \Auth::user()->id;

        $result = \DB::table('years')->select('*')->whereUser_id($user_id)->orderBy('created_at', 'desc')->get()->toArray();

        return $result;
    }

    public static function select_months($id){
        $user_id = \Auth::user()->id;

        $result = \DB::table('months')->select('*')->whereUser_idAndYear_id($user_id, $id)->orderBy('created_at', 'asc')->get()->toArray();

        return $result;
    }

    public static function select_days($id){
        $user_id = \Auth::user()->id;

        $result = \DB::table('days')->select('*')->whereUser_idAndMonth_id($user_id, $id)->orderBy('created_at', 'asc')->get()->toArray();

        return $result;
    }

    public static function select_costs($id){
        $user_id = \Auth::user()->id;

        $results = \DB::select(\DB::raw("SELECT
        costs.id, costs.user_id, costs.month_id ,months.limit_amount, costs.title,
        costs.cost_amount, costs.description, costs.created_at, costs.updated_at
        FROM `costs`
        JOIN `months` ON costs.month_id = months.id
        WHERE costs.user_id = $user_id AND costs.day_id = $id
        ORDER BY costs.created_at desc
        "));

        return $results;
    }

    public static function check_month_limit_amount(){

        $user_id = \Auth::user()->id;

        if(\DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first() !== null) {
            $id_year = \DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first();

            $id_month = \DB::table('months')->select('id')->whereUser_idAndYear_idAndMonth($user_id, $id_year->id, date('F'))->first();

            $amount = \DB::table('months')->select('limit_amount')->whereUser_idAndYear_idAndId($user_id, $id_year->id, $id_month->id)->first();

            return($amount);
        }else{
            return(\DB::table('years')->select('id')->whereUser_idAndYear($user_id, date('Y'))->first());
        }

    }
}
