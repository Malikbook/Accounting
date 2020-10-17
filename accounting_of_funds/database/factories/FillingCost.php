<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Costs;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Costs::class, function (Faker $faker) {

    $min_id_user = \App\Models\User::min('id');
    $max_id_user = \App\Models\User::max('id');
    $min_id_year = \App\Models\Years::min('id');
    $max_id_year = \App\Models\Years::max('id');
    $min_id_month = \App\Models\Months::min('id');
    $max_id_month = \App\Models\Months::max('id');
    $min_id_day = \App\Models\Days::min('id');
    $max_id_day = \App\Models\Days::max('id');

    return [
        'user_id' => $faker->numberBetween($min = $min_id_user, $max_id_user),
        'year_id' => $faker->numberBetween($min = $min_id_year, $max = $max_id_year),
        'month_id' => $faker->numberBetween($min = $min_id_month, $max = $max_id_month),
        'day_id' => $faker->numberBetween($min = $min_id_day, $max = $max_id_day),
        'title' => $faker->company,
        'cost_amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
