<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Wdi\Entities\User;

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
    
    /** @var \Wdi\Entities\User|null */
    protected $loggedUser = null;
    
    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }
    
    /**
     * Login an user for testing purpose
     *
     * @param \Wdi\Entities\User|null $user
     */
    public function login(User $user = null)
    {
        $this->loggedUser = $user ?? factory(User::class)->create();
        $this->actingAs($this->loggedUser);
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
