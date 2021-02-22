<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++){
            User::create([
                'name' => 'name' .$i,
                'email' => 'email'.$i.'@gmail.com',
                'password' => Hash::make('name' .$i)
            ]);
        }
        for ($i=0;$i<10;$i++){
            Category::create([
              'name' => 'category name '.$i,
              'slug' => Str::slug('category name '.$i)
            ]);
        }
        for ($i=0;$i<10;$i++) {
            Question::create([
                'title' => 'title ' . $i,
                'slug' => Str::slug('title ' . $i),
                'body' => 'body' . $i,
                'category_id' => rand(1,10),
                'user_id' => rand(1,10)
            ]);
        }
        for ($i=0;$i<50;$i++) {
           Reply::create([
               'body' => 'reply body ' .$i,
               'question_id' => rand(1,10),
               'user_id' => rand(1,10)
           ]);
        }
        for ($i=0;$i<100;$i++) {
            Like::create([
               'reply_id' => rand(1,50),
                'user_id' => rand(1,10)
            ]);
        }
    }
}
