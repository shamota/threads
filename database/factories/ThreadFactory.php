<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Models\Thread\Thread;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'title'         => $faker->streetName,
        'content'       => $faker->text(200) . ".",
        'created_at'    => Carbon::now()->subSeconds($faker->randomNumber(9))
    ];
});
