<?php

namespace Tests\Browser;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testCategoryCreateForm():void
    {
        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('/admin/categories/create')
                ->type('title', $category->title)
                ->type('author', $category->author)
                ->press('Сохранить')
                ->assertPathIs('/admin/categories');
        });
    }

    /**
     * @throws Throwable
     */
    public function testCategoryUpdateForm():void
    {
        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('/admin/categories/1/edit')
                ->type('title', $category->title)
                ->type('author', $category->author)
                ->press('Сохранить')
                ->assertPathIs('/admin/categories');
        });
    }
}
