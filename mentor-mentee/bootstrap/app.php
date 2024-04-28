<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authUser' => \App\Http\Middleware\RedirectAuthUser::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isMentor' => \App\Http\Middleware\IsMentor::class,
            'isMentee' => \App\Http\Middleware\IsMentee::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
