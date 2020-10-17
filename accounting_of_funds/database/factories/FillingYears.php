<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Years;
use Faker\Generator as Faker;

$factory->define(Years::class, function (Faker $faker) {

    $min_id = \App\Models\User::min('id');
    $max_id = \App\Models\User::max('id');

    return [
        'user_id' => $faker->numberBetween($min = $min_id, $max = $max_id),
        'year' => $faker->year
    ];
});
