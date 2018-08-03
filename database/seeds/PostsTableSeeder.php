<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new Post();
        $post->truncate();
        factory(App\Post::class,10)->create()->each(function ($posts) {
            $posts->save();
        });
        
    }
}
