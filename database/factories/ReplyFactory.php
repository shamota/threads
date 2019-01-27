<?php

use App\Models\Thread\Reply;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $users = User::all();
    return [
        'content'   => $faker->text(500),
        'user_id'   => $users->random()->id
    ];
});
