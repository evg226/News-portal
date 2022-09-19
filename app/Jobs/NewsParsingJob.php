<?php

namespace App\Jobs;

use App\Models\Source;
use App\Services\Contracts\ParserContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Source $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ParserContract $parser)
    {
        if ($parser->setSource($this->source)
            ->getParsedData()
            ->writeToDB()
        )   echo "\nЗагрузка из источника: {$this->source->url} успешно завершена";
    }
}
