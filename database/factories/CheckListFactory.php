<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CheckList;
use Faker\Generator as Faker;

$factory->define(CheckList::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'creator_id' => function () {
            return App\User::first()->id;
        },
        'text' => $faker->text,
        'check_list_id' => function () {
            return CheckList::first()->id;
        }
    ];
});
