<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class ListLanguagesHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class ListLanguagesHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_shows_a_list_of_available_languages()
    {
        $this->get("languages")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("language.list")
            ->assertViewHas("languages");
    }
}
