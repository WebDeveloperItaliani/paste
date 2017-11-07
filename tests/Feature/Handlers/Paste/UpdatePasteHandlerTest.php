<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class UpdatePasteHandlerTest
 * @group Handlers
 * @package Tests\Feature
 */
final class UpdatePasteHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var \Wdi\Entities\Paste */
    private $paste;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->paste = factory(Paste::class)->states("with-password")->create([
            "password" => "foobar",
        ]);
    }
    
    /** @test */
    public function it_updates_the_current_paste()
    {
        $this->put("pastes/{$this->paste->slug}/edit", [
            "name" => "foo",
            "code" => $this->paste->code,
            "language_id" => $this->paste->language->id,
            "extension" => $this->paste->extension,
            "description" => "bar",
            "password" => "foobar",
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route("paste.show", $this->paste->slug));
        
        $this->assertDatabaseHas(Paste::TABLE_NAME, [
            "id" => $this->paste->id,
            "name" => "foo",
            "description" => "bar",
        ]);
    }
    
    /** @test */
    public function password_is_required_in_order_to_edit_a_paste()
    {
        $this->withExceptionHandling();
        
        $this->put("pastes/{$this->paste->slug}/edit", [
            "name" => "foo",
            "code" => $this->paste->code,
            "language_id" => $this->paste->language->id,
            "extension" => $this->paste->extension,
            "description" => "bar",
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["password"]);
    }
    
    /** @test */
    public function password_must_match_in_order_to_edit_a_paste()
    {
        $this->withExceptionHandling();
        
        $this->put("pastes/{$this->paste->slug}/edit", [
            "name" => "foo",
            "code" => $this->paste->code,
            "language_id" => $this->paste->language->id,
            "extension" => $this->paste->extension,
            "description" => "bar",
            "password" => "barfoo"
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["password"]);
    }
}
