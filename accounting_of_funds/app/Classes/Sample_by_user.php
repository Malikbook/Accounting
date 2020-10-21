<?php

namespace App\Classes;

class Sample_by_user
{
    public static function sample(){

        $user_id = \Auth::user()->id;

        $str_month = date('F');

        $results_one = \DB::select(\DB::raw("SELECT
        costs.id, users.name, years.year,
        months.month, days.numeric, costs.title,
        costs.cost_amount, costs.description, costs.created_at, costs.updated_at
        FROM `costs`
        JOIN `users` ON costs.user_id = users.id
        JOIN `years` ON costs.year_id = years.id
        JOIN `months` ON costs.month_id = months.id
        JOIN `days` ON costs.day_id = days.id
        WHERE costs.user_id = $user_id and months.month = '{$str_month}'
        ORDER BY costs.created_at
        "));

        $results_two = \DB::select(\DB::raw("SELECT
        costs.id, users.name, years.year,
        months.month, days.numeric, costs.title,
        costs.cost_amount, costs.description, costs.created_at, costs.updated_at
        FROM `costs`
        JOIN `users` ON costs.user_id = users.id
        JOIN `years` ON costs.year_id = years.id
        JOIN `months` ON costs.month_id = months.id
        JOIN `days` ON costs.day_id = days.id
        WHERE costs.user_id = $user_id and months.month != '{$str_month}'
        ORDER BY costs.created_at LIMIT 30
        "));


        $results = [
            'one' => $results_one,
            'two' => $results_two
        ];

//        echo '<pre>';
//    var_dump($results_one);
//    exit;

        return ($results);
    }
}
