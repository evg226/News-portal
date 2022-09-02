<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoryQueryBuilder
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Category::query();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return $this->builder
            ->with('news')
            ->paginate(config('pagination.admin.categories'));
    }

    public function getAll()
    {
        return $this->builder->get();
    }

    public function create(array $data): Category|bool
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->fill($data)
            ->save();
    }
}
