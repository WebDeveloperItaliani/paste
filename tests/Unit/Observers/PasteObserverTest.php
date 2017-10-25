<?php

namespace Tests\Unit;

use Tests\TestCase;
use Wdi\Entities\Paste;
use Wdi\Factories\PasteFactory;

/**
 * Class PasteObserverTest
 *
 * @group Observers
 * @package Tests\Unit
 */
final class PasteObserverTest extends TestCase
{
    /** @test */
    public function it_adds_a_slug_every_time_a_paste_is_created()
    {
        // Lazy
        $paste = PasteFactory::create(
            factory(Paste::class)->make()->toArray()
        );
        
        $this->assertNotNull($paste->slug);
    }
}
