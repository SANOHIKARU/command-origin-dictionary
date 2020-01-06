<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Model;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,

    ];
});
