<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Post::create([
            'title' => 'About Us',
            'description' => $faker->paragraph(),
            'status' => 1,
            'comment_able' => 0,
            'post_type' => 'Page',
            'category_id' => 1,
            'user_id' => 1,
        ]);
    }
}
