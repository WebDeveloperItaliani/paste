<?php

namespace Wdi\Observers;

use Auth;
use Wdi\Entities\Paste;

/**
 * Class PasteObserver
 *
 * @package Wdi\Observers
 */
final class PasteObserver
{
    /**
     * When a paste is being created a
     * new slug is generated which is unique
     *
     * @param \Wdi\Entities\Paste $paste
     */
    public function creating(Paste $paste)
    {
        if (Auth::check()) {
            $paste->user_id = Auth::id();
        }
        $paste->slug = slugfy();
    }
    
}
