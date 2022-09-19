<?php

namespace App\Services;

use App\Models\Source;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\Services\Contracts\ParserContract;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserContract
{
    private Source $source;
    private array $parsed;

    /**
     * @param Source $source
     * @return ParserService
     */
    public function setSource(Source $source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return array
     */
    public function getParsedData(): self
    {
        $xml = XmlParser::load($this->source->url);

        $this->parsed = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[author,title,link,guid,description,pubDate]',
            ]
        ]);
        return $this;
    }

    public function writeToDB(): bool
    {
        if (!$this->parsed) return false;
        $category = app(CategoryQueryBuilder::class)->getByTitle($this->parsed['title'],$this->parsed['description']);
        $data = [];
        foreach ($this->parsed['news'] as $item) {
            $data[] = [
                'slug'=>Str::slug($item['title']),
                'source_id' => $this->source->id,
                'category_id' => $category->id,
                'title' => $item['title'],
                'description' => mb_substr($item['description'], 0, 255),
                'content' => "<a href='" . $item['link'] . "'>" . $item['link'] . "</a>",
                'author' => $item['author'],
            ];
        }
        return app(NewsQueryBuilder::class)->upsert($data);

    }
}
