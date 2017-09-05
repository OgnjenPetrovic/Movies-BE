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
$factory->define(App\Movie::class, function (Faker $faker) {
    
    return [
        'name' => $faker->name,
        'director' => $faker->name,
        'imageUrl' => $faker->imageUrl($width = 350, $height = 280),
        'duration' =>  $faker->numberBetween(1,130),
        'releaseDate' => $faker->date($format = 'Y-m-d'),
        'genres' => ['name' => $faker->word],
    ];
});
