<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Language;
use Wdi\Entities\Paste;

/**
 * Class AddForkHandlerTest
 * @group Handlers
 * @package Tests\Feature
 */
final class AddForkHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var \Wdi\Entities\Language */
    private $language;
    /** @var \Wdi\Entities\Paste */
    private $paste;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->language = factory(Language::class)->create();
        $this->paste = factory(Paste::class)->create();
    }
    
    /** @test */
    public function an_user_can_fork_a_paste()
    {
        $stub = factory(Paste::class)->states("plain")->make();
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "language_id" => $this->language->id,
            "extension" => $this->language->extensions[1],
            "name" => $stub->name,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHas("flash_notification");
        
        $this->assertDatabaseHas(Paste::TABLE_NAME, [
            "paste_id" => $this->paste->id,
            "language_id" => $this->language->id,
            "name" => $stub->name,
            "code" => $stub->code,
            "description" => $stub->description,
        ]);
    }
    
    /** @test */
    public function name_is_required_in_order_to_fork_a_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "language_id" => $this->language->id,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["name"]);
    }
    
    /** @test */
    public function name_must_be_at_least_3_chars_long_in_order_to_fork_a_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make([
            "name" => str_random(2)
        ]);
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "language_id" => $this->language->id,
            "name" => $stub->name,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["name"]);
    }
    
    /** @test */
    public function code_is_required_in_order_to_fork_a_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "language_id" => $this->language->id,
            "name" => $stub->name,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["code"]);
    }
    
    /** @test */
    public function language_is_required_in_order_to_fork_a_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "name" => $stub->name,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["language_id"]);
    }
    
    /** @test */
    public function language_must_exists_in_order_to_fork_a_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes/{$this->paste->slug}/fork", [
            "language_id" => 237,
            "name" => $stub->name,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["language_id"]);
    }
}
