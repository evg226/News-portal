<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourceQueryBuilder $builder): View
    {
        $sources = $builder->get();
        return view('pages.admin.sources.index', ['sources' => $sources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,SourceQueryBuilder $builder):RedirectResponse
    {

        $request->validate([
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'url' => ['required', 'string', 'min:3', 'max:255']
            ]
        );
        $validated = $request->only('name', 'description', 'url');
        if ($builder->create($validated)){
            return
                redirect(route('admin.sources'))
                    ->with('success', 'Источник новостей добавлен успешно');
        }
        return
            back()
                ->with('error', 'Ошибка при добавлении источника новостей');
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
    public function edit(Source $source):View
    {
        return view('pages.admin.sources.edit',['source'=>$source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        SourceQueryBuilder $builder,
        Source $source
    ):RedirectResponse
    {
        $request->validate([
                'name' => ['required', 'string', 'min:5', 'max:255'],
                'url' => ['required', 'string', 'min:3', 'max:255']
            ]
        );
        $validated = $request->only('name', 'description', 'url');
        if ($builder->update($source,$validated)){
            return
                redirect(route('admin.sources'))
                    ->with('success', 'Источник новостей изменен успешно');
        }
        return
            back()
                ->with('error', 'Ошибка при изменении источника новостей');
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
