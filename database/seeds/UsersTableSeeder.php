<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
    
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'role' => 'user',
            'password' => bcrypt('user'),
            'email_verified_at' => now(),
        ]);

        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });

        

        /*factory(App\Post::class, 10)->create()->each(function ($post) {//générer les comments
            $post->hasComments()->save(factory(App\Comments::class)->create());
        });*/


    }
}
