<?php 

namespace App\Classes;

class Sample_by_user
{
    public static function sample(){

        $user_id = \Auth::user()->id;

        $results = \DB::select(\DB::raw("SELECT
        costs.id, users.name, years.year,
        months.month, days.numeric, costs.title, 
        costs.cost_amount, costs.description, costs.created_at, costs.updated_at
        FROM `costs`
        JOIN `users` ON costs.user_id = users.id
        JOIN `years` ON costs.year_id = years.id
        JOIN `months` ON costs.month_id = months.id
        JOIN `days` ON costs.day_id = days.id
        WHERE costs.user_id = $user_id
        ORDER BY costs.created_at desc LIMIT 10
        "));
    
        return ($results);
    }
}