<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_post = new Post();
            $new_post->title = $faker->sentence();
            $new_post->content = $faker->paragraph(rand(20, 25), false);
            $new_post->slug = Post::generatePostSlug($new_post->title);
            $new_post->save();
        }
    }
}
