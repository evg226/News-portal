<?php

namespace App\QueryBuilders;



use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder

{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = News::query();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return $this->builder
            ->with((['category','source']))
            ->paginate(config('pagination.admin.news'));
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)
            ->save();
    }

    public function getBySlug(string $slug):Builder{
        return $this->builder
            ->where('slug','=',$slug);
    }

    public function upsert(array $data): bool
    {
        return News::upsert(
            $data,
            ['slug'],
            ['content','author']
        );
    }
}
