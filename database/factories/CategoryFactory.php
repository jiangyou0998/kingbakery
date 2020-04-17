<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => 'CAT1',
        'description' => 'desc_1',
        'order' => 1,
        'parent_id' => null
    ];
});
