<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use App\Category;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    $title = $faker->sentence ;
    return [

       'title' => $title,
       'slug' => Str::slug($title),
       'body' => $faker->text ,
        'category_id' => function(){
            return Category::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
