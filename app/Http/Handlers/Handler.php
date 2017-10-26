<?php

namespace Wdi\Http\Handlers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseHandler;


/**
 * Class Handler
 *
 * @package Wdi\Http\Handlers
 */
abstract class Handler extends BaseHandler
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
