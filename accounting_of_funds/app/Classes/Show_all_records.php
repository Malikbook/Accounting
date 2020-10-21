<?php

namespace App\Classes;

class Show_all_records
{

    public static function select_years(){
        $user_id = \Auth::user()->id;

        $result_years = \DB::table('years')->select('*')->whereUser_id($user_id)->orderBy('created_at', 'desc')->get()->toArray();

        $results_costs = \DB::select(\DB::raw("SELECT DISTINCT
        years.year, SUM(costs.cost_amount) as total, costs.user_id
        FROM `costs`
        JOIN `years` ON costs.year_id = years.id
        WHERE costs.user_id = $user_id
        GROUP BY years.year LIMIT 5
        "));

        $result = [
            'year' => $result_years,
            'costs' => $results_costs
        ];


        return $result;
    }

    public static function select_months($id){
        $user_id = \Auth::user()->id;

        $result_month = \DB::table('months')->select('*')->whereUser_idAndYear_id($user_id, $id)->orderBy('created_at', 'asc')->get()->toArray();

        $results_limit = \DB::select(\DB::raw("SELECT DISTINCT
        months.month, SUM(costs.cost_amount) as total, months.user_id
        FROM `months`
        JOIN `costs` ON costs.month_id = months.id
        WHERE months.user_id = $user_id
        GROUP BY months.month
        "));

        $result = [
            'months' => $result_month,
            'limit' => $results_limit
        ];

        return $result;
    }

    public static function select_days($id){
        $user_id = \Auth::user()->id;

        $results = \DB::table('days')->select('*')->whereUser_idAndMonth_id($user_id, $id)->orderBy('created_at', 'asc')->get()->toArray();

        if($results != null){

            $results_costs = \DB::select(\DB::raw("SELECT
            SUM(costs.cost_amount) as total, days.numeric
            FROM `costs`
            JOIN `days` ON costs.day_id = days.id
            WHERE costs.user_id = $user_id AND costs.month_id = $id
            GROUP BY days.numeric
            "));

            $arr = array();

            $res = [
                'check' => $results_costs
            ];

            foreach($res['check'] as $check){
                $arr[$check->total] = $check->numeric;
            }

            if(in_array(date('d'), $arr) == false){
                    $arr['this_day'] = date('d');
            }

            $result = [
                'days' => $results,
                'check' => $arr,
            ];

            return $result;
        }else{
            $result = \DB::table('days')->select('*')->whereUser_idAndMonth_id($user_id, $id)->orderBy('created_at', 'asc')->get()->toArray();

            return $result;
        }

    }

    public static function select_costs($id){
        $user_id = \Auth::user()->id;

        $results_costs = \DB::select(\DB::raw("SELECT
        costs.id, costs.user_id, costs.month_id ,months.limit_amount, months.month, costs.title,
        costs.cost_amount, costs.description, costs.created_at, costs.updated_at
        FROM `costs`
        JOIN `months` ON costs.month_id = months.id
        WHERE costs.user_id = $user_id AND costs.day_id = $id
        ORDER BY costs.created_at desc
        "));

        $results_limit = \DB::select(\DB::raw("SELECT
        months.month, SUM(costs.cost_amount) as total
        FROM `costs`
        JOIN `months` ON costs.month_id = months.id
        WHERE costs.user_id = $user_id
        GROUP BY months.month desc
        "));

        $results = [
            'months' => $results_costs,
            'limit' => $results_limit
        ];

        if(count($results['months']) != 0){
            return $results;
        }else{
            return $results = $results_costs;
        }
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
