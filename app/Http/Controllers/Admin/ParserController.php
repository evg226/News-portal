<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
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
     * @param ParserService $parserService
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @param NewsQueryBuilder $newsQueryBuilder
     * @param Source $source
     * @return RedirectResponse
     */
    public function __invoke(
        Request              $request,
        ParserService        $parserService,
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder     $newsQueryBuilder,
        Source               $source): RedirectResponse
    {
        $data = $parserService->setLink($source->url)
            ->getParsedData();
        $category = $categoryQueryBuilder->getByTitle($data['title']);
        collect($data['news'])->each(function ($item) use ($source, $category, $newsQueryBuilder) {
            $newsQueryBuilder->create([
                'source_id' => $source->id,
                'category_id' => $category->id,
                'title' => $item['title'],
                'description' => mb_substr($item['description'],0,255),
                'content' => "<a href='".$item['link']."'>".$item['link']."</a>",
                'author' => auth()->user()->name
            ]);
        });
        return back()->with('success', 'Загрузка новостей завершена');
    }
}
