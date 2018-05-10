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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\book::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'category_id' => function(){
            return factory('App\category')->create()->id;
        },
        'name' => $faker->title,
        'price' => $faker->numberBetween(500,2500),
        'pages' => $faker->numberBetween(100,5000)
    ];
});


$factory->define(App\category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->word,
    ];
});
