<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $posts = [];

        for ($i=0; $i < 100; $i++) {
            array_push($posts, [
                'category_id' => rand(1, 100),
                'admin_id' => rand(1, 100),
                'title' => $fake->name(),
                'image' => $fake->imageUrl(),
                'content' => $fake->text(100)
            ]);
        }

        Post::insert($posts);
    }
}
