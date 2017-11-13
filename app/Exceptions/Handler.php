<?php

namespace Wdi\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class Handler
 *
 * @package Wdi\Exceptions
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];
    
    /** {@inheritdoc} */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    
    /** {@inheritdoc} */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
    
    
    /** {@inheritdoc} */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        flash()->error("Non sei autenticato");
        
        return redirect()->route("home");
    }
    
}
