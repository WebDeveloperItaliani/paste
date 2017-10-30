<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Language;

/**
 * Class LanguageApiTest
 * @group Api
 * @package Tests\Feature
 */
final class LanguageApiTest extends TestCase
{
    use RefreshDatabase;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
    
        factory(Language::class, 10)->create();
    }
    
    /** @test */
    public function it_returns_a_list_of_available_languages()
    {
        $response = $this->get("api/languages");
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(["languages"]);
        $this->assertCount(10, $response->json()["languages"]);
    }
}
