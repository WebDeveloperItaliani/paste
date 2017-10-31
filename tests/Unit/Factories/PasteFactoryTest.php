<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Wdi\Entities\Paste;
use Wdi\Factories\PasteFactory;

/**
 * Class PasteFactoryTest
 *
 * @package Tests\Unit
 */
final class PasteFactoryTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var array */
    private $stub = [];
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->stub = factory(Paste::class)->make()->toArray();
    }
    
    /** @test */
    public function it_will_hydrate_the_array_of_attributes()
    {
        $attributes = [
            "foo" => "bar",
            "user_id" => 1,
            "bar" => "foo",
            "code" => "foobar",
            "description" => "boofar",
        ];
        
        $attributes = PasteFactory::hydrate($attributes);
        
        $this->assertArrayNotHasKey("foo", $attributes);
        $this->assertArrayNotHasKey("bar", $attributes);
    }
    
    /** @test */
    public function it_can_create_a_paste()
    {
        $paste = PasteFactory::create($this->stub);
        
        $this->assertInstanceOf(Paste::class, $paste);
        $this->assertDatabaseHas(Paste::TABLE_NAME, $this->stub);
    }
    
    /** @test */
    public function it_can_create_a_fork_of_a_given_paste()
    {
        $parent = factory(Paste::class)->create();
        $fork = PasteFactory::createForkFrom($this->stub, $parent);
        
        $this->assertEquals($parent->id, $fork->paste_id);
        $this->assertNotEquals($parent->id, $fork->id);
        $this->assertNotEquals($parent->slug, $fork->slug);
    }
    
}
