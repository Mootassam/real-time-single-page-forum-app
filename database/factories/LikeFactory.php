<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [


   'user_id'=> function(){
       return User::all()->random();
   }

    ];
});
