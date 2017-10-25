<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class ShowPasteForksHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class ShowPasteForksHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_shows_a_list_of_forks_of_a_given_paste()
    {
        $paste = factory(Paste::class)->create();
        // Create a bunch of forks
        factory(Paste::class, 10)->states("forked")->create([
            "paste_id" => $paste->id,
        ]);
        
        $this->get("pastes/{$paste->slug}/forks")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.forks")
            ->assertViewHas("paste");
    }
}
