<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddFeedbackTest extends DuskTestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * @throws \Throwable
     */
    public function testAddFeedback()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback')
                ->type('name', 'Name')
                ->type('email', 'tttt@example.com')
                ->append('review', 'Text test 1')
                ->assertDontSee('Поле Наименование обязательно для заполнения.')
                ->assertDontSee('Поле Описание обязательно для заполнения.');
        });
    }
}
