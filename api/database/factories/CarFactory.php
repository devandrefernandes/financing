<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\Car\Models\Car;
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

$factory->define(Car::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomDigit,
        'image_url' => $faker->imageUrl($width = 200, $height = 200),
    ];
});
