<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Wdi\Entities\Language;
use Wdi\Entities\Paste;

/**
 * Class PasteTest
 *
 * @group Entities
 * @package Tests\Unit
 */
final class PasteTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_has_a_table_name()
    {
        $this->assertEquals("pastes", Paste::TABLE_NAME);
    }
    
    /** @test */
    public function it_use_slug_as_route_key_name()
    {
        $this->assertEquals("slug", (new Paste())->getRouteKeyName());
    }
    
    /** @test */
    public function it_may_displays_file_name_and_extension_altogether()
    {
        $paste = factory(Paste::class)->make([
            "name" => "foo",
            "extension" => "bar",
        ]);
        
        $this->assertEquals("foo.bar", $paste->fileName);
    }
    
    /** @test */
    public function it_can_tell_if_its_a_fork()
    {
        $paste = factory(Paste::class)->make();
        
        $this->assertFalse($paste->isAFork());
    }
    
    /** @test */
    public function it_can_tell_if_it_has_forks_related()
    {
        $paste = factory(Paste::class)->create();
        factory(Paste::class)->states("forked")->create([
            "paste_id" => $paste->id,
        ]);
        
        $this->assertTrue($paste->hasForks());
    }
    
    /** @test */
    public function it_may_have_forks_related()
    {
        $paste = factory(Paste::class)->create();
        
        $this->assertFalse($paste->hasForks());
        $this->assertInstanceOf(Collection::class, $paste->forks);
        $this->assertContainsOnlyInstancesOf(Paste::class, $paste->forks);
    }
    
    /** @test */
    public function it_may_have_been_forked()
    {
        $paste = factory(Paste::class)->states("forked")->create();
        
        $this->assertInstanceOf(Paste::class, $paste->forked);
    }
    
    /** @test */
    public function it_may_have_language_related()
    {
        $paste = factory(Paste::class)->create();
        
        $this->assertInstanceOf(Language::class, $paste->language);
    }
}
