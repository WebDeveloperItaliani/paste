<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Wdi\Entities\Language;
use Wdi\Entities\Paste;

/**
 * Class AddPasteHandlerTest
 *
 * @package Tests\Feature
 */
final class AddPasteHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var \Wdi\Entities\Language */
    private $language;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->language = factory(Language::class)->create();
    }
    
    /** @test */
    public function an_user_can_add_a_new_paste()
    {
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes", [
            "language_id" => $this->language->id,
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertViewIs("paste.show")
            ->assertViewHas("paste");
        
        $this->assertDatabaseHas(Paste::TABLE_NAME, [
            "language_id" => $this->language->id,
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ]);
    }
    
    /** @test */
    public function file_name_is_required_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
    
        $this->post("pastes", [
            "language_id" => $this->language->id,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["file_name"]);
    }
    
    /** @test */
    public function file_name_must_be_at_least_3_chars_long_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make([
            "file_name" => str_random(2)
        ]);
        
        $this->post("pastes", [
            "language_id" => $this->language->id,
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["file_name"]);
    }
    
    /** @test */
    public function extension_is_required_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes", [
            "language_id" => $this->language->id,
            "file_name" => $stub->file_name,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["extension"]);
    }
    
    /** @test */
    public function code_is_required_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes", [
            "language_id" => $this->language->id,
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["code"]);
    }
    
    /** @test */
    public function language_is_required_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
       
        $this->post("pastes", [
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["language_id"]);
    }
    
    /** @test */
    public function language_must_exists_in_order_to_add_a_new_paste()
    {
        $this->withExceptionHandling();
        $stub = factory(Paste::class)->make();
        
        $this->post("pastes", [
            "language_id" => 237,
            "file_name" => $stub->file_name,
            "extension" => $stub->extension,
            "code" => $stub->code,
            "description" => $stub->description,
        ])
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHasErrors(["language_id"]);
    }
}
