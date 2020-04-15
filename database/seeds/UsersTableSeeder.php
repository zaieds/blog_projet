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

        /*
        User::create([
        
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->role = 'admin';
        $admin->password = bcrypt('admin');
        $admin->email_verified_at = now();
        $admin->save();
        

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@user.com';
        $user->role = 'user';
        $user->password = bcrypt('user');
        $user->email_verified_at = now();
        $user->save();

        /*User::create([

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
        */

        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->role = 'admin';
        $admin->password = bcrypt('admin');
        $admin->email_verified_at = now();
        $admin->save();


        $user = new User();
        $user->name = 'User';
        $user->email = 'user@user.com';
        $user->role = 'user';
        $user->password = bcrypt('user');
        $user->email_verified_at = now();
        $user->save();



        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
        
    }
}
