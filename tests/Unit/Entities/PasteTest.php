<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Wdi\Entities\Paste;

/**
 * Class PasteTest
 *
 * @group Entities
 * @package Tests\Unit
 */
final class PasteTest extends TestCase
{
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
        $paste = factory(Paste::class)->make();
        
        $this->assertInstanceOf(Collection::class, $paste->forks);
        $this->assertContainsOnlyInstancesOf(Paste::class, $paste->forks);
    }
}
