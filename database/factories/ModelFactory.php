<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'contact' => $faker->phoneNumber,
        'role_id'=> (int) rand (2 , 3),
        'user_status_id'=> 1,
        'password' => bcrypt('theirwaski'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => 'Ryan Boter',
        'email' => 'jayson.boter90@gmail.com',
        'password' => $password ?: $password = bcrypt('theirwaski'),
        'remember_token' => str_random(10),
    ];
});



