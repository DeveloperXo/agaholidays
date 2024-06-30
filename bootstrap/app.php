<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/i-am-healthy',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'admin_guest' => \App\Http\Middleware\AdminGuestMiddleware::class,
            'admin_auth' => \App\Http\Middleware\AdminAuthMiddleware::class
        ]);
        $middleware->redirectTo(
            guests: '/login',
            users: '/profile'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
