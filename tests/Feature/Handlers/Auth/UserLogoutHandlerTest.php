<?php

namespace Tests\Feature;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class UserLogoutHandlerTest
 * @group Auth
 * @package Tests\Feature
 */
final class UserLogoutHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_performs_logout()
    {
        $this->login();
        
        $this->get("auth/logout")
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect("/");
        
        $this->assertGuest();
    }
    
    /** @test */
    public function an_exception_will_raise_if_a_guest_tries_to_logout()
    {
        $this->expectException(AuthenticationException::class);
        
        $this->get("auth/logout");
    }
    
    /** @test */
    public function a_guest_will_be_redirect_home_if_tries_to_logout()
    {
        $this->withExceptionHandling();
        
        $this->get("auth/logout")
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect("/");
    }
}
