<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function generateNews(array $categories): array
    {
        $news = [];
        for ($i = 1; $i <= 10; $i++) {
            $news[] = $this->generateNewsItem($i,$categories);
        }
        return $news;
    }

    protected function generateNewsItem(int $id,array $categories=[]): array
    {
        $faker = Factory::create();
        $newsItem = [
            'id' => $id,
            'title' => $faker->sentence(3),
            'description' => $faker->sentence(),
            'content' => $faker->sentences(20, true),
            'image' => $faker->imageUrl(),
            'author' => $faker->name(),
            'created_at' => $faker->date(),
            'category_id' =>count($categories)>0?
                $categories[rand(0,count($categories)-1)]
                : rand(1,10)
        ];
        return $newsItem;
    }

    protected function generateCategories(): array
    {
        $faker = Factory::create();
        $categories = [];
        for ($i = 1; $i <= 10; $i++) {
            $categories[] = [
                'id' => $i,
                'title' => $faker->sentence(2),
                'author' => $faker->name(),
                'created_at' => $faker->date()
            ];
        }
        return $categories;
    }

}


