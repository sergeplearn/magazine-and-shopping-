<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\category;
use Faker\Generator as Faker;

$factory->define(category::class, function (Faker $faker) {
    $category_name = $faker->name;
    return [
        'category_name'=>$category_name,
        'slug'=>\Illuminate\Support\Str::slug($category_name),
    ];
});
