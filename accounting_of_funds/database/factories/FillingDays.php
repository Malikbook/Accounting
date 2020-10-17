<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Days;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Days::class, function (Faker $faker) {

    $min_id_user = \App\Models\User::min('id');
    $max_id_user = \App\Models\User::max('id');
    $min_id_year = \App\Models\Years::min('id');
    $max_id_year = \App\Models\Years::max('id');
    $min_id_month = \App\Models\Months::min('id');
    $max_id_month = \App\Models\Months::max('id');

    return [
        'user_id' => $faker->numberBetween($min = $min_id_user, $max_id_user),
        'year_id' => $faker->numberBetween($min = $min_id_year, $max = $max_id_year),
        'month_id' => $faker->numberBetween($min = $min_id_month, $max = $max_id_month),
        'numeric' => $faker->dayOfMonth($max = 'now') 
    ];
});
