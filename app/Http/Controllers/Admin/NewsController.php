<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest as NewsCreateRequest;
use App\Http\Requests\News\EditRequest as NewsEditRequest;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function store(NewsCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['source_id'] = 1;

        if (News::create($validated)) {
            return
                redirect(route('admin.news'))
                    ->with('success', __('messages.admin.create.success', ['attribute' => $validated['title']]));
        }
        return
            back()
                ->with('error', __('messages.admin.create.error', ['attribute' => $validated['title']]));
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
        NewsEditRequest  $request,
        NewsQueryBuilder $builder,
        News             $news
    ): RedirectResponse
    {
        $validated = $request->validated();

        if ($builder->update($news, $validated)) {
            return
                redirect(route('admin.news'))
                    ->with('success', __('messages.admin.update.success', ['attribute' => $validated['title']]));
        }
        return
            back()
                ->with('error', __('messages.admin.update.error', ['attribute' => $validated['title']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(Request $request, News $news):JsonResponse
    {
        if ($request->expectsJson()) {
            try {
                $news->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $exception) {
                return response()->json(['error' => $exception->getMessage()]);
            }
        } else
            return response()->json(['error' => 'Ожидается запрос c json-параметрами'], 404);
    }
}
