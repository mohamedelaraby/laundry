<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Invoice;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Invoice::class, function (Faker $faker) {
    return [

        'release_date' => $faker->dateTime(),
        'expire_date' => $faker->dateTime(),
        'code' => Str::random(10),
        'user_id' => $faker->numberBetween(1,500),
        // 'car_id' => $faker->numberBetween(1,4),
        'service_id' => $faker->numberBetween(1,500),
    ];
});
