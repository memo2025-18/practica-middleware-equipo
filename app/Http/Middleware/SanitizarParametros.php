<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanitizarParametros
{
    public function handle(Request $request, Closure $next): Response
    {
        // ANTES del controlador
        if ($request->has('codigo')) {
            $request->merge([
                'codigo' => strtoupper($request->input('codigo'))
            ]);
        }

        // La petición continúa hacia el controlador
        $response = $next($request);

        // DESPUÉS del controlador
        $response->headers->set(
            'X-Procesado-Por',
            'Middleware-Laravel'
        );

        return $response;
    }
}
