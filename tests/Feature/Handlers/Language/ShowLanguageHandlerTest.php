<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Language;

/**
 * Class ShowLanguageHandlerTest
 * @group Handlers
 * @package Tests\Feature
 */
final class ShowLanguageHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_shows_a_view_of_a_given_language()
    {
        $language = factory(Language::class)->create();
        
        $this->get("languages/{$language->name}")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("language.show")
            ->assertViewHas("language");
    }
}
