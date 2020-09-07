<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Comment::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'url' => $faker->url,
            'ip_address' => $faker->ipv4,
            'comment' => $faker->paragraph(2 , true),
            'status' => rand(0, 1),
            'post_id' => 1,
            'user_id' => 1,
        ]);
    }
}
