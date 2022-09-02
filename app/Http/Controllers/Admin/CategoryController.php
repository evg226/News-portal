<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
    public function store(Request $request, CategoryQueryBuilder $categoryQueryBuilder): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'author' => ['required', 'string', 'min:3', 'max:50']
        ]);
        $validated = $request->only('title', 'author');
        if ($categoryQueryBuilder->create($validated)) {
            return redirect(route('admin.categories'))
                ->with('success', 'Категория добавлена успешно');
        }
        return back()
            ->with('error', 'Ошибка при добавлении категории');
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
        Request              $request,
        Category             $category,
        CategoryQueryBuilder $categoryQueryBuilder): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'author' => ['required', 'string', 'min:3', 'max:50']
        ]);
        $validated = $request->only('title', 'author');
        if ($categoryQueryBuilder->update($category, $validated)) {
            return redirect(route('admin.categories'))
                ->with('success', 'Категория изменена успешно');
        }
        return back()
            ->with('error', 'Ошибка при изменеии категории');
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
