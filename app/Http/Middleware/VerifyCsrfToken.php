<?php

namespace Wdi\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

/**
 * Class VerifyCsrfToken
 *
 * @package Wdi\Http\Middleware
 */
final class VerifyCsrfToken extends BaseVerifier
{
    /** {@inheritdoc} */
    protected $except = [];
}
