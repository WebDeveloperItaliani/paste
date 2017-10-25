<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class HelpersTest
 *
 * @package Tests\Unit
 */
final class HelpersTest extends TestCase
{
    /** @test */
    public function it_generates_a_random_slug()
    {
        $this->assertNotNull(slugfy());
    }
    
    /** @test */
    public function slugfy_accepts_a_length_as_variable()
    {
        $this->assertCount(3, $this->explode(slugfy()));
        $this->assertCount(4, $this->explode(slugfy(4)));
    }
    
    private function explode(string $string) : array
    {
        $string = preg_replace('/(?<!^)([A-Z])/', '-\\1', $string);
        
        return explode("-", $string);
    }
}
