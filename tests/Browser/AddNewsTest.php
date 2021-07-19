<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddNewsTest extends DuskTestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * @throws \Throwable
     */
    public function testAddCategories() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create_categories')
                ->type('title', 'Categories Test 1')
                ->type('description', 'Description')
                ->check('is_active')
                ->assertDontSee('Поле Наименование обязательно для заполнения.')
                ->assertDontSee('Поле Описание обязательно для заполнения.');
        });
    }
    /**
     * @throws \Throwable
     */
    public function testAddNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'News Test 1')
                ->type('description', 'Description')
                ->type('text', 'Text')
                ->type('publication_date', '31.03.2020')
                ->press('.btn')
                ->assertDontSee('Поле Наименование обязательно для заполнения.')
                ->assertDontSee('Поле Текст обязательно для заполнения.')
                ->assertDontSee('Поле Описание обязательно для заполнения.')
                ->assertDontSee('Поле Дата публикации обязательно для заполнения.');
        });
    }
}
