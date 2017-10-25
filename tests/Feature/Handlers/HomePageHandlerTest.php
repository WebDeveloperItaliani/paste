<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class HomePageHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class HomePageHandlerTest extends TestCase
{
    /** @test */
    public function it_displays_home_page()
    {
        $this->get("")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("home");
    }
}
