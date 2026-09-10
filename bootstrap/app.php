<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registramos el alias aquí
        $middleware->alias([
            'clave.acceso' => \App\Http\Middleware\ValidarClaveAcceso::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
