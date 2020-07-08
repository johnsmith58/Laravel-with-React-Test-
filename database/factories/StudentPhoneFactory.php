<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentPhone;
use App\User;
use Faker\Generator as Faker;

$factory->define(StudentPhone::class, function (Faker $faker) {
    return [
       'student_id' => factory(User::class)->create()->id,
       'phone_number' => $faker->phoneNumber
    ];
});
