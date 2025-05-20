<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'admin' => \App\Http\Middleware\CustomAuthenticate::class,
    ];

    protected $middlewareAliases = [
        // ...
        'admin' => \App\Http\Middleware\CustomAuthenticate::class,
    ];
    
    // ... resto de propiedades y métodos de la clase Kernel
}