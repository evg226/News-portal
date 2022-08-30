<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return
            $request->expectsJson() ?
                response()->json($categories) :
                back()->with('error', 'Воспользуйтесь фильтрами на странице новости');
    }

    public function show(Request $request, int $id)
    {
        $news=News::all()->where('category_id',$id);
        return
            $request->expectsJson() ?
                response()->json($news) :
                back()->with('error', 'Воспользуйтесь фильтрами на странице новости');
    }
}
