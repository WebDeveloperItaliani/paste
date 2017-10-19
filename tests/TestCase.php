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
}
