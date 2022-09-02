<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $builder): View
    {
        $newsList = $builder->get();
        return view('pages.admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::all();
        $statuses = News::STATUSES;
        return view('pages.admin.news.create', [
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'content' => ['required', 'string', 'min:20'],
            'image' => ['required', 'string', 'min:10', 'max:254'],
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'status' => ['required'],
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
        ]);

        $validated = $request->only(
            'title', 'description', 'content', 'image', 'author', 'status', 'category_id'
        );
        $validated['source_id'] = 1;

        if (News::create($validated)) {
            return
                redirect(route('admin.news'))
                    ->with('success', 'Новость добавлена успешно');
        }
        return
            back()
                ->with('error', 'Ошибка при добавлении новости');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder): View
    {
        return view('pages.admin.news.edit', [
            'newsItem' => $news,
            'statuses' => News::STATUSES,
            'categories' => $categoryQueryBuilder->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request          $request,
        NewsQueryBuilder $builder,
        News             $news
    ): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'content' => ['required', 'string', 'min:20'],
            'image' => ['required', 'string', 'min:10', 'max:254'],
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'status' => ['required'],
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
        ]);

        $validated = $request->only(
            'title', 'description', 'content', 'image', 'author', 'status', 'category_id'
        );

        if ($builder->update($news, $validated)) {
            return
                redirect(route('admin.news'))
                    ->with('success', 'Новость изменена успешно');
        }
        return
            back()
                ->with('error', 'Ошибка при изменении новости');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
