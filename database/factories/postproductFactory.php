<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\postproduct;
use App\category;
use Faker\Generator as Faker;

$factory->define(postproduct::class, function (Faker $faker) {
    $title = $faker->sentence(15);
    return [
        'title'=>$title,
        'slug'=>\Illuminate\Support\Str::slug($title),
        'image_path'=>$faker->sentence(15),
        'body'=>$faker->sentence(15),
        'category_id'=>factory(category::class)->create(),
    ];
});
