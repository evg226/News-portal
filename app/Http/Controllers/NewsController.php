<?php

namespace App\Http\Controllers;

use App\Models\News;
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

    public function show(Request $request, int $id): View
    {
        $news=News::find($id);
        return view('pages.news.item', [
                'newsItem' => $news
            ]
        );
    }

}
