<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        return view('pages.news.index',[
            'newsList'=>$this->generateNews()
        ]);
    }

    public function show(Request $request, int $id): View
    {
        return view('pages.news.item', [
            'newsItem' => [
                'id' => $id
            ]
        ]);
    }

    private function generateNews(): array
    {
        $faker = Factory::create();
        $news = [];
        for ($i = 1; $i < 10; $i++) {
            $news[] = [
                'id' => $i,
                'title' => $faker->sentence(3),
                'description' => $faker->sentence(),
                'content' => $faker->sentences(20, true),
                'image' => $faker->imageUrl()
            ];
        }
        return $news;

    }
}
