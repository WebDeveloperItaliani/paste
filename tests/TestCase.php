<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    /** @var string */
    protected $baseUrl = "http://localhost/";
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }
    
    /**
     * Handy function to determine the hash status
     * between plain text and hashed string
     * 
     * @param string $plain
     * @param string $hashed
     */
    public function assertHash(string $plain, string $hashed)
    {
        static::assertTrue(
            app("hash")->check($plain, $hashed)
        );
    }
}
