<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Months;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Months::class, function (Faker $faker) {

    $min_id_u = \App\Models\User::min('id');
    $max_id_u = \App\Models\User::max('id');
    $min_id_y = \App\Models\Years::min('id');
    $max_id_y = \App\Models\Years::max('id');
    
    return [
       'user_id' => $faker->numberBetween($min = $min_id_u, $max = $max_id_u),
       'year_id' => $faker->numberBetween($min = $min_id_y, $max = $max_id_y),
       'month' => $faker->monthName($max = 'now')
    ];
});