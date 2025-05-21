<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveLastVisitedUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        // Solo guarda rutas GET que no sean login, register o peticiones ajax
        if (
            $request->method() === 'GET' &&
            !$request->ajax() &&
            !$request->is('login', 'register')
        ) {
            session(['url_anterior' => $request->fullUrl()]);
        }

        return $next($request);
    }
}
