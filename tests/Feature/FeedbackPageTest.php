<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackPageTest extends TestCase
{

    public function testExample()
    {
        $response = $this->post('/feedback');
        $response->assertStatus(302);
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }
}
