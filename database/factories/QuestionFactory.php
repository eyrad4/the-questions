<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5,10)), '.'),
        'text' => $faker->paragraph(rand(3,7), true),
        'votes' => rand(-10, 10),
        'views' => rand(0, 15)
    ];
});
