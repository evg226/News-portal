<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\Contracts\ParserContract;
use App\Services\ParserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function __invoke(
        Request $request,
        ParserContract $parser,
        Source  $source): RedirectResponse
   {
        NewsParsingJob::dispatch($source);
        return back()->with('success', 'Загрузка новостей запущена');
    }
}
