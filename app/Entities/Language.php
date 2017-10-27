<?php

namespace Wdi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class Language.
 */
final class Language extends Model
{
    const TABLE_NAME = "languages";
    
    /** {@inheritdoc} */
    protected $table = self::TABLE_NAME;
    
    /** {@inheritdoc} */
    protected $fillable = ["name", "extensions"];
    
    /** {@inheritdoc} */
    protected $guarded = ["id"];
    
    /** {@inheritdoc} */
    protected $casts = [
        "extensions" => "array"
    ];
    
    /** {@inheritdoc} */
    public function getRouteKeyName()
    {
        return "name";
    }
    
    /**
     * On language can have many pastes related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pastes() : HasMany
    {
        return $this->hasMany(Paste::class);
    }
}
