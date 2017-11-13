<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Wdi\Entities\Paste;
use Wdi\Entities\User;
use Wdi\Entities\UserSocial;

/**
 * Class UserTest
 * @group Entities
 * @package Tests\Unit
 */
final class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_has_a_table_name()
    {
        $this->assertEquals("users", User::TABLE_NAME);
    }
    
    /** @test */
    public function it_can_tell_if_it_has_pastes_related()
    {
        $user = factory(User::class)->create();
        factory(Paste::class)->states("with-user")->create([
            "user_id" => $user->id,
        ]);
        
        $this->assertTrue($user->hasPastes());
    }
    
    /** @test */
    public function it_may_have_pastes_related()
    {
        $user = factory(User::class)->make();
        
        $this->assertFalse($user->hasPastes());
        $this->assertInstanceOf(Collection::class, $user->pastes);
        $this->assertContainsOnlyInstancesOf(Paste::class, $user->pastes);
    }
    
    /** @test */
    public function it_may_have_social_profiles_related()
    {
        $user = factory(User::class)->make();
        
        $this->assertInstanceOf(Collection::class, $user->socialProfiles);
        $this->assertContainsOnlyInstancesOf(UserSocial::class, $user->socialProfiles);
    }
    
    /** @test */
    public function it_may_have_facebook_profile_related()
    {
        $user = factory(User::class)->create();
        factory(UserSocial::class)->states("facebook")->create([
            "user_id" => $user->id,
        ]);
        
        $this->assertInstanceOf(UserSocial::class, $user->facebookProfile);
    }
}
