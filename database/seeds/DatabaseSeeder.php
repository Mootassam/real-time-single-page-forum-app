<?php

use App\User;

use App\Reply;
use App\Category;
use App\Question;
use Illuminate\Database\Seeder;
use App\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Factory(User::class,10)->create();
        Factory(Category::class,5)->create();
        Factory(Question::class,10)->create();
        Factory(Reply::class,10)->create()->each(function ($reply){
            return $reply->Like()->save(factory(Like::class)->make());

        });

    }
}
