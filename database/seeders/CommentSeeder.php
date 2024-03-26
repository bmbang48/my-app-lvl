<?php

namespace Database\Seeders;

use App\Models\Comment;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            Comment::create([
                'post_id' => 5,
                'comment' => Str::random(50)
            ]);
        }
    }
}
