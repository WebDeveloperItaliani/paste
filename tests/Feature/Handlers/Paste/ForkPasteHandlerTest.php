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
final class ForkPasteHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function an_user_can_fork_a_given_paste()
    {
        $paste = factory(Paste::class)->create();
        
        $this->post("pastes/{$paste->slug}/fork")
            ->assertStatus(Response::HTTP_FOUND);
        
        $this->assertDatabaseHas(Paste::TABLE_NAME, [
            "paste_id" => $paste->id,
            "file_name" => $paste->file_name,
            "extension" => $paste->extension,
        ]);
    }
}
