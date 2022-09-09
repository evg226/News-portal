<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest as UserEditRequest;
use App\Models\User;
use App\QueryBuilders\UserQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserQueryBuilder $builder): View
    {
        return view('pages.admin.users.index', ['users' => $builder->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {
        return back()->with('error', __('messages.admin.create.error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        return back()->with('error', __('messages.admin.create.error'));
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
    public function edit(User $user): View
    {
        return view('pages.admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserEditRequest $request
     * @param UserQueryBuilder $builder
     * @param User $user
     * @return RedirectResponse
     */
    public function update(
        UserEditRequest  $request,
        UserQueryBuilder $builder,
        User             $user
    ): RedirectResponse
    {
        $validated = $request->validated();
        if ($builder->update($user, $validated)) {
            return redirect(route('admin.users'))
                ->with('success', __('messages.admin.update.success', ['attribute' => $validated['name']]));
        }
        return back()->with('error', __('messages.admin.update.success', ['attribute' => $validated['name']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user):JsonResponse
    {
        if ($request->expectsJson()) {
            try {
                $user->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $exception) {
                return response()->json($exception->getMessage());
            }
        } else
            return response()->json(['error' => 'Ожидается запрос c json-параметрами'], 404);
    }
}
