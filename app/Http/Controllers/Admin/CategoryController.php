<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest as CategoryCreateRequest;
use App\Http\Requests\Categories\EditRequest as CategoryEditRequest;
use App\Models\Category;
use App\QueryBuilders\CategoryQueryBuilder;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryQueryBuilder $categoryQueryBuilder): View
    {
        $categories = $categoryQueryBuilder->get();
        return view('pages.admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateRequest $request, CategoryQueryBuilder $categoryQueryBuilder): RedirectResponse
    {
        $validated = $request->validated();
        if ($categoryQueryBuilder->create($validated)) {
            return redirect(route('admin.categories'))
                ->with('success', __('messages.admin.create.success', ['attribute' => $validated['title']]));
        }
        return back()
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category): View
    {
        return view('pages.admin.categories.update', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function update(
        CategoryEditRequest  $request,
        Category             $category,
        CategoryQueryBuilder $categoryQueryBuilder): RedirectResponse
    {
        $validated = $request->validated();
        if ($categoryQueryBuilder->update($category, $validated)) {
            return redirect(route('admin.categories'))
                ->with('success', __('messages.admin.update.success', ['attribute' => $validated['title']]));
        }
        return back()
            ->with('error', __('messages.admin.update.error', ['attribute' => $validated['title']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Category $category): \Illuminate\Http\JsonResponse
    {
        if ($request->expectsJson()) {
            try {
                $category->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $exception) {
                return response()->json(['error'=>$exception->getMessage()]);
            }
        } else
            return response()->json(['error'=>'Ожидается запрос c json-параметрами'],404);
    }
}
