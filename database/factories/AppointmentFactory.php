<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Appointment;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
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

$factory->define(Appointment::class, function (Faker $faker) {
   $status =  [
    Appointment::STATUS_ACTIVE,
    Appointment::STATUS_PENDING,
    Appointment::STATUS_CANCELED,
   ];

    return [

        'due_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'status' =>$status[rand(0,2)],
        'user_id' => $faker->numberBetween(1,500),
        'car_id' => $faker->numberBetween(1,4),
        'service_id' => $faker->numberBetween(1,500),
    ];
});
