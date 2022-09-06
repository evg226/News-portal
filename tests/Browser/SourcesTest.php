<?php

namespace Tests\Browser;

use App\Models\Source;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SourcesTest extends DuskTestCase
{
    public function testSourcesCreateForm(): void
    {
        $source = Source::factory()->create();

        $this->browse(function (Browser $browser) use ($source) {
            $browser->visit('/admin/sources/create')
                ->type('name', $source->name)
                ->type('description', $source->description)
                ->type('url', $source->url)
                ->press('Сохранить')
                ->assertPathIs('/admin/sources');
        });
    }

    public function testSourcesUpdateForm(): void
    {
        $source = Source::factory()->create();

        $this->browse(function (Browser $browser) use ($source) {
            $browser->visit('/admin/sources/2/edit')
                ->type('name', $source->name)
                ->type('description', $source->description)
                ->type('url', $source->url)
                ->press('Сохранить')
                ->assertPathIs('/admin/sources');
        });
    }

}
