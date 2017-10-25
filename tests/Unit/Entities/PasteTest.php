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
    public function it_may_have_forks_related()
    {
        $paste = factory(Paste::class)->create();
        
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
        $paste = factory(Paste::class)->states("with-language")->create();
        
        $this->assertInstanceOf(Language::class, $paste->language);
    }
}
