<?php

namespace Tests\Browser;

use App\Models\News;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    public function testNewsCreateForm(): void
    {
        $news = News::factory()->create();

        $this->browse(function (Browser $browser) use ($news) {
            $browser->visit('/admin/news/create')
                ->type('title', $news->title)
                ->type('description', $news->description)
                ->type('content', $news->content)
                ->type('image', $news->image)
                ->type('author', $news->author)
                ->select('status', $news->status)
                ->select('category_id', $news->category_id)
//                ->type('source_id', $news->source_id)
                ->press('Submit')
                ->assertPathIs('/admin/news');
        });
    }
    public function testNewsUpdateForm(): void
    {
        $news = News::factory()->create();

        $this->browse(function (Browser $browser) use ($news) {
            $browser->visit('/admin/news/1/edit')
                ->type('title', $news->title)
                ->type('description', $news->description)
                ->type('content', $news->content)
                ->type('image', $news->image)
                ->type('author', $news->author)
                ->select('status', $news->status)
                ->select('category_id', $news->category_id)
//                ->type('source_id', $news->source_id)
                ->press('Submit')
                ->assertPathIs('/admin/news');
        });
    }


}
