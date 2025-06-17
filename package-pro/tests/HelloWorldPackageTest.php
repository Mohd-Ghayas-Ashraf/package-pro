<?php

namespace Ghayas\HelloWorldPackage\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelloWorldPackageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_hello_world_page()
    {
        $response = $this->get('/hello-world');

        $response->assertStatus(200);
        $response->assertSee('Hello world');
    }

    /** @test */
    public function it_can_load_the_view_directly()
    {
        $response = $this->get('/hello-world');

        $response->assertViewIs('hello-world-package::index');
    }
}