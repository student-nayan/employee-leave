<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    // ✅ REQUIRED IN LARAVEL 12
    protected $middlewareAliases = [
        'auth'    => \Illuminate\Auth\Middleware\Authenticate::class,
        'isAdmin' => \App\Http\Middleware\AdminAuthentication::class,
        'isUser'  => \App\Http\Middleware\UserAuthentication::class,
    ];
}
