<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class CreatePasteHandlerTest
 *
 * @group Handlers
 * @package Tests\Feature
 */
final class CreatePasteHandlerTest extends TestCase
{
    /** @test */
    public function it_displays_the_create_paste_view()
    {
        $this->get("pastes/create")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.create");
    }
}
