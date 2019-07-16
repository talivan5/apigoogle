<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'descripcion'=>$faker->text(200),
        'city'=>$faker->city,
        'address'=>$faker->address,
        'lat'=>$faker->latitude(19.5,64.5),
        'lng'=>$faker->longitude(-17.964434,-67.103808)
    ];
});
