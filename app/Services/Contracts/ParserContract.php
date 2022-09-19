<?php
declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Source;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use phpDocumentor\Reflection\Types\This;

interface ParserContract
{
    /**
     * @param Source $source
     * @return ParserContract
     */
    public function setSource(Source $source): self;

    /**
     * @return ParserContract
     */
    public function getParsedData(): self;

    /**
     * @return bool
     */
    public function writeToDB(): bool;
}
