<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class ShowPasteHandlerTest
 * @group Handlers
 * @package Tests\Feature
 */
final class ShowPasteHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var \Wdi\Entities\Paste */
    private $paste;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->paste = factory(Paste::class)->create();
    }
    
    /** @test */
    public function it_shows_a_single_paste()
    {
        $this->get("pastes/{$this->paste->slug}")
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.show")
            ->assertViewHas("paste");
    }
}
