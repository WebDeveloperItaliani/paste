<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class EditPasteHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class EditPasteHandlerTest extends TestCase
{
    /** @test */
    public function it_displays_the_edit_paste_view()
    {
        $paste = factory(Paste::class)->create();
        
        $this->get("pastes/{$paste->slug}/edit")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.edit");
    }
}
