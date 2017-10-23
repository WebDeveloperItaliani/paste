<?php


if (!function_exists("slugfy")) {
    /**
     * Procedural generate slug
     *
     * @param int $length
     * @return string
     */
    function slugfy(int $length = 3) : string
    {
        $combination = "";
        
        for ($i = 0; $i < $length; $i++) {
            
            $seed = array_random(config("procedural.animals"));
            
            if (mt_rand() % 2 === 0) {
                $seed = array_random(config("procedural.adjectives"));
            }
            
            if (!str_contains($combination, $seed)) {
                $combination .= ucfirst($seed);
            }
        }
        
        return $combination;
    }
}
