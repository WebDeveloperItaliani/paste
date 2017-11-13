<?php

namespace Wdi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserSocial
 * @package Wdi\Entities
 */
final class UserSocial extends Model
{
    const TABLE_NAME = "users_socials";
    
    /** {@inheritdoc} */
    protected $table = self::TABLE_NAME;
    
    /** {@inheritdoc} */
    protected $fillable = ["user_id", "social_id", "provider", "oauth_token", "oauth_secret", "oauth_refresh",
        "expires_in", "email", "nickname", "name", "avatar"];
    
    /** {@inheritdoc} */
    protected $guarded = ["id"];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
