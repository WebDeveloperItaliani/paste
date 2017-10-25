<?php

namespace Wdi\Factories;

use Wdi\Entities\Paste;

/**
 * Class PasteFactory
 *
 * @package Wdi\Factories
 */
final class PasteFactory implements IFactory
{
    /** {@inheritdoc} */
    public static function hydrate(array $attributes) : array
    {
        $fillable = (new Paste())->getFillable();
        
        return array_only($attributes, $fillable);
    }
    
    /** {@inheritdoc} */
    public static function create(array $attributes)
    {
        $attributes = self::hydrate($attributes);
        
        return (new Paste())->create($attributes);
    }
    
    public static function createForkFrom(Paste $paste)
    {
        $fork = $paste->replicate();
        $fork->paste_id = $paste->id;
        
        return static::create($fork->toArray());
    }
}
