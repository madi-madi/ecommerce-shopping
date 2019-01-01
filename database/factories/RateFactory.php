<?php

use Faker\Generator as Faker;
use App\User;
use App\Product;
$factory->define(App\Rate::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->random()->id,
        'product_id'=>Product::all()->random()->id,
        'rating'=> $faker->randomFloat(2,1,5),
    ];
});
