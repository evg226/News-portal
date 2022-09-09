<?php

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;


class UserQueryBuilder
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = User::query();
    }

    public function get(): LengthAwarePaginator
    {
        return $this->builder->paginate(config('pagination.admin.users'));
    }

    public function update(User $user, array $data):bool
    {
        return $user->fill($data)->save();
    }
}
