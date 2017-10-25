<?php

namespace Wdi\Observers;

use Wdi\Entities\Paste;

/**
 * Class PasteObserver
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
        $paste->slug = slugfy();
    }
    
}
