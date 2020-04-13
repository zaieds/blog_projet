<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Comments;
use App\Post;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Post::all();
        foreach($posts as $post){
            $post->hasComments()->save(factory(App\Comments::class)->create());
        }
    }
}
