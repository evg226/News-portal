<?php

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')
            ->insert($this->generateNews());
    }

    protected function generateNews(): array
    {
        $faker = Factory::create();
        $news = [];
        for ($i = 1; $i <= 100; $i++) {
            $news[] = [
                'title' => $faker->sentence(3),
                'description' => $faker->sentence(),
                'content' => $faker->sentences(50, true),
                'image' => $faker->imageUrl(),
                'author' => $faker->name(),
                'status' => array_values(News::STATUSES)[rand(0, 2)],
                'category_id' => rand(1, 20),
                'source_id' => rand(1, 10),
            ];
        }
        return $news;
    }
}
