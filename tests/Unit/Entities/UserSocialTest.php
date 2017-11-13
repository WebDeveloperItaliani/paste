<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Wdi\Entities\User;
use Wdi\Entities\UserSocial;

/**
 * Class UserSocialTest
 * @group Entities
 * @package Tests\Unit
 */
final class UserSocialTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_has_a_table_name()
    {
        $this->assertEquals("users_socials", UserSocial::TABLE_NAME);
    }
    
    /** @test */
    public function it_may_belongs_to_an_user()
    {
        $userSocial = factory(UserSocial::class)->states("facebook")->create();
        
        $this->assertInstanceOf(User::class, $userSocial->user);
    }
}
