<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) { //générer les posts
            $user->posts()->save(factory(App\Post::class)->create());
        });

        factory(App\Post::class, 10)->create()->each(function ($post) {//générer les comments
            $post->hasComments()->save(factory(App\Comments::class)->create());
        });

    }
}
