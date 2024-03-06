<?php

namespace Tests\Unit;

use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_home_page_contains_knot()
    {
        $response = $this->get("/");
        $response->assertSee('Knot');
    }

    public function test_home_page_does_not_containe_duck()
    {
        $response = $this->get('/');
        $response->assertDontSee('duck');
        // $response->assertSee('duck');  // fails -> as the home page does not contain the term named duck.
    }
}
