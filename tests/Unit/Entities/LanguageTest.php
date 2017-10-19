<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Wdi\Entities\Language;
use Wdi\Entities\Paste;

/**
 * Class LanguageTest
 *
 * @group Entities
 * @package Tests\Unit
 */
final class LanguageTest extends TestCase
{
    /** @test */
    public function it_has_a_table_name()
    {
        $this->assertEquals("languages", Language::TABLE_NAME);
    }
    
    /** @test */
    public function it_may_have_pastes_related()
    {
        $language = factory(Language::class)->make();
        
        $this->assertInstanceOf(Collection::class, $language->pastes);
        $this->assertContainsOnlyInstancesOf(Paste::class, $language->pastes);
    }
}
