<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Dependence;

$factory->define(Dependence::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'ip1'=>$faker->ipv4,
        'ip2'=>$faker->ipv4
    ];
});
