<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = $this->generateCategories();

        return
            $request->expectsJson() ?
                response()->json($categories) :
                back()->with('error', 'Воспользуйтесь фильтрами на странице новости');
    }

    public function show(Request $request, int $id)
    {
        return
            $request->expectsJson() ?
                response()->json($this->generateNewsItem($id)) :
                back()->with('error', 'Воспользуйтесь фильтрами на странице новости');
    }
}
