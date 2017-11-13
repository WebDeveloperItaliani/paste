<?php

namespace Wdi\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package Wdi\Entities
 */
final class User extends Authenticatable
{
    use SoftDeletes;
    
    const TABLE_NAME = "users";
    
    /** {@inheritdoc} */
    protected $table = self::TABLE_NAME;
    
    /** {@inheritdoc} */
    protected $guarded = ["id"];
    
    /** {@inheritdoc} */
    protected $hidden = ["remember_token"];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialProfiles() : HasMany
    {
        return $this->hasMany(UserSocial::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facebookProfile() : HasOne
    {
        return $this->hasOne(UserSocial::class)->where("provider", "facebook");
    }
}
