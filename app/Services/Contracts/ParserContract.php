<?php
declare(strict_types=1);

namespace App\Services\Contracts;

interface ParserContract
{
    /**
     * @param string $link
     * @return ParserContract
     */
    public function setLink(string $link): self;

    /**
     * @return array
     */
    public function getParsedData(): array;
}
