<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CheckListItem;
use Faker\Generator as Faker;

$factory->define(CheckListItem::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        #'check_list_id' => function () {
            #return CheckList::first()->id;
        #}
    ];
});
