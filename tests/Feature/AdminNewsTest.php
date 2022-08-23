<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_news()
    {
        $response = $this->get(route('admin.news'));
        $response->assertStatus(200)
            ->assertViewIs('pages.admin.news.index')
            ->assertViewHas(('newsList'));
    }

    public function test_admin_news_create()
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertStatus(200)
            ->assertViewIs('pages.admin.news.create');
    }

    public function test_admin_news_store()
    {
        $response = $this->post(route('admin.news.store'), [
            'title' => 'Тестовая строка',
            'description' => 'Тестовая строка строка ',
            'content' => 'Тест Тест Тест Тест Тест Тест Тест',
            'image' => 'Тестовая строка строка строка',
            'author' => 'Тестовая строка',
        ]);
        $response->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.news'));

    }

    public function test_admin_news_store_validate()
    {
        $response = $this->post(route('admin.news.store'), []);
        $response->assertStatus(302)
            ->assertSessionHasErrors(['title', 'description', 'content', 'image', 'author',]);
        $response = $this->post(route('admin.news.store'), [
            'title' => 'Тест',
            'description' => 'Тестовая',
            'content' => 'Тестовая строка',
            'image' => 'Тесто',
            'author' => 'Т.',
        ]);
        $response->assertStatus(302)
            ->assertSessionHasErrors(['title', 'description', 'content', 'image', 'author',]);
    }
}
