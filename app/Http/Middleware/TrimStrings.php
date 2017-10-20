<?php

namespace Wdi\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

/**
 * Class TrimStrings
 *
 * @package Wdi\Http\Middleware
 */
final class TrimStrings extends BaseTrimmer
{
    /** {@inheritdoc} */
    protected $except = [
        "password",
        "password_confirmation",
    ];
}
