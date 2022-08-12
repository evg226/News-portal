<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categories = $request->has('categories')?$request->get('categories'):[];

        $newsList = $this->generateNews($categories);
        return
            $request->expectsJson() ?
                response()->json($newsList):
                view('pages.news.index', [
                        'newsList' => $newsList
                    ]
                );
    }

    public function show(Request $request, int $id): View
    {
        return view('pages.news.item', [
                'newsItem' => $this->generateNewsItem($id)
            ]
        );
    }

}
