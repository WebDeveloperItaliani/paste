<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class SocialRedirectHandlerTest
 * @group Auth
 * @package Tests\Feature
 */
final class SocialRedirectHandlerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function an_already_logged_user_cannot_login_again()
    {
        $this->login();
        
        $this->get("auth/login/facebook/redirect")
            ->assertStatus(Response::HTTP_FOUND)
            ->assertSessionHas("flash_notification")
            ->assertRedirect("/");
    }
}
