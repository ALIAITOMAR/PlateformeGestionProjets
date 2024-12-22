<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserActivity;
use App\Http\Middleware\CompletedRegistration;
use App\Http\Middleware\Role;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            UserActivity::class,
        ]);

        $middleware->alias([
            'completed_registration' => CompletedRegistration::class,
            'role' => Role::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
