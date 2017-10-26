<?php

namespace Wdi\Http\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseApi;

/**
 * Class Controller
 *
 * @package Wdi\Http\Api
 */
abstract class Api extends BaseApi
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
