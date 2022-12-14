<?php

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourceQueryBuilder
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Source::query();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return $this->builder
            ->with('news')
            ->paginate(config('pagination.admin.sources'));
    }

    public function create(array $data): Source|bool
    {
        return Source::create($data);
    }

    public function update(Source $source, array $data): bool
    {
        return $source->fill($data)
            ->save();
    }

}
