<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_categories()
    {
        $response = $this->get(route('admin.categories'));
        $response->assertStatus(200)
            ->assertViewIs('pages.admin.categories.index')
            ->assertViewHas(('categories'));
    }

    public function test_admin_categories_create()
    {
        $response = $this->get(route('admin.categories.create'));
        $response->assertStatus(200)
            ->assertViewIs('pages.admin.categories.create');
    }

    public function test_admin_categories_store()
    {
        $response = $this->post(route('admin.categories.store'), [
            'title' => 'Новая категория',
            'author' => 'Виктор'
        ]);
        $response->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.categories'));

    }

    public function test_admin_categories_store_validate()
    {
        $response = $this->post(route('admin.categories.store'), []);
        $response->assertStatus(302)
            ->assertSessionHasErrors(['title', 'author']);
        $response = $this->post(route('admin.categories.store'), [
            'title'=>'Кор',
            'author'=>'T.'
        ]);
        $response->assertStatus(302)
            ->assertSessionHasErrors(['title', 'author']);
    }
}
