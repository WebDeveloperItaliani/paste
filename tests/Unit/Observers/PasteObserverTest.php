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
    public function foobar()
    {
        // Lazy
        $paste = PasteFactory::create(
            factory(Paste::class)->make()->toArray()
        );
        
        $this->assertNotNull($paste->slug);
    }
}
