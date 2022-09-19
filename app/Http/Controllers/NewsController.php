<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $newsList=[];
        if ($request->has('categories')) {
            $categories = array_map('intval', $request->query('categories'));
            $newsList = News::whereIn('category_id',$categories)->select()->get();
        } else {
            $newsList = News::all();
        }


        return
            $request->expectsJson() ?
                response()->json($newsList) :
                view('pages.news.index', [
                        'newsList' => $newsList
                    ]
                );
    }

    public function show(string $slug, NewsQueryBuilder $builder): View
    {
        return view('pages.news.item', [
                'newsItem' => $builder->getBySlug($slug)->first()
            ]
        );
    }

}
