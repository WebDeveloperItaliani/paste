<?php

namespace Tests\Feature;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class UserLogoutHandlerTest
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
    public function a_guest_user_cannot_perform_logout()
    {
        $this->expectException(AuthenticationException::class);
        
        $this->get("auth/logout")
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHas("flash_message")
            ->assertRedirect("/");
    }
}
