<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest as SourcesCreateRequest;
use App\Http\Requests\Sources\EditRequest as SourcesEditRequest;
use App\Models\Source;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Http\JsonResponse;
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
    public function store(SourcesCreateRequest $request, SourceQueryBuilder $builder): RedirectResponse
    {
        $validated = $request->validated();
        if ($builder->create($validated)) {
            return
                redirect(route('admin.sources'))
                    ->with('success', __('messages.admin.create.success', ['attribute' => $validated['name']]));
        }
        return
            back()
                ->with('success', __('messages.admin.create.error', ['attribute' => $validated['name']]));
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
    public function edit(Source $source): View
    {
        return view('pages.admin.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        SourcesEditRequest $request,
        SourceQueryBuilder $builder,
        Source             $source
    ): RedirectResponse
    {
        $validated = $request->validated();
        if ($builder->update($source, $validated)) {
            return
                redirect(route('admin.sources'))
                    ->with('success', __('messages.admin.update.success', ['attribute' => $validated['name']]));
        }
        return
            back()
                ->with('error', __('messages.admin.update.error', ['attribute' => $validated['name']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Source $source):JsonResponse
    {
        if ($request->expectsJson()) {
            try {
                $source->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $exception) {
                return response()->json($exception->getMessage());
            }
        } else
            return response()->json(['error' => 'Ожидается запрос c json-параметрами'], 404);
    }
}
