<?php


if (!function_exists("slugfy")) {
    /**
     * Procedural generated slug
     *
     * @param int $length
     * @return string
     */
    function slugfy(int $length = 3) : string
    {
        $basket = array_merge(config("procedural.adjectives"), config("procedural.animals"));
        
        $combination = array_map(
            "ucfirst",
            array_random($basket, $length)
        );
        
        return implode("", $combination);
    }
}
