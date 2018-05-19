<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Sport::class, function (Faker $faker) {
    return [
        "object_id" => str_random(10),
        "group_name" => $faker->name,
        "group_id" => rand(1111111, 9999999),
        "away_name" => $faker->name,
        "home_name" => $faker->name,
        "players_name" => $faker->name . '-' . $faker->name,
        "sports" => "FOOTBALL",
        "country" => "ENGLAND",
        "state" => "STARTED",
        "event_date" => Carbon\Carbon::now(),
    ];
});
