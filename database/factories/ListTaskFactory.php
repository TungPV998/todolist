<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ListTask;
use Faker\Generator as Faker;

$factory->define(ListTask::class, function (Faker $faker) {
    return [
        'content' =>$faker->text,
        'status'=>$faker->randomElement([0,1])
    ];
});
