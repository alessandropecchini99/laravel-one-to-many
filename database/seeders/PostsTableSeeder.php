<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {

            Post::create([
                'type_id'       => rand(1, 6),
                'title'         => $faker->words(rand(2, 10), true),
                'url_image'     => 'https://picsum.photos/id/' . rand(1, 270) . '/500/400',
                'content'       => $faker->paragraph(rand(2, 20), true),
            ]);
        }
    }
}
