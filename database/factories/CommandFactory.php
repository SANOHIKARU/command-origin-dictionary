<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Model;
use App\Command;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Command::class, function (Faker $faker) {

    $category_ids  = Category::pluck('category_id')->all();

    return [
        'name' => $faker->word,
        'origin' => $faker->sentence,
        'description' => $faker->sentence,
        'category_id' => $faker->randomElement($category_ids),

    ];
});
