<?php

namespace Wdi\Factories;

/**
 * Interface IFactory
 *
 * @package Wdi\Factories
 */
interface IFactory
{
    /**
     * @param array $attributes
     * @return array
     */
    public static function hydrate(array $attributes) : array;
    
    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes);
}
