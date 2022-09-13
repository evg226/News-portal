<?php

namespace App\Services;

use App\Services\Contracts\ParserContract;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserContract
{
    private string $link;

    /**
     * @param string $link
     * @return void
     */
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return array
     */
    public function getParsedData(): array
    {
        $xml = XmlParser::load($this->link);

        return $xml->parse([
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
                'uses' => 'channel.item[title,link,guid,description,pubDate]',
            ]
        ]);
    }
}
