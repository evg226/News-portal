<?php

namespace App\Providers;

use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use App\QueryBuilders\UserQueryBuilder;
use App\Services\Contracts\ParserContract;
use App\Services\Contracts\SocialContract;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //QueryBuilders
        $this->app->bind(CategoryQueryBuilder::class);
        $this->app->bind(SourceQueryBuilder::class);
        $this->app->bind(NewsQueryBuilder::class);
        $this->app->bind(UserQueryBuilder::class);

        //Services
        $this->app->bind(ParserContract::class,ParserService::class);
        $this->app->bind(SocialContract::class,SocialService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
