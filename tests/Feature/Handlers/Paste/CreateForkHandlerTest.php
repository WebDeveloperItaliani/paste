<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class ForkPasteHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class CreateForkHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_displays_the_fork_paste_view()
    {
        $paste = factory(Paste::class)->create();
        
        $this->get("pastes/{$paste->slug}/fork")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.fork")
            ->assertViewHas("paste");
    }
}
