<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Rol;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || $request->user()->rol->nombre !== $role) {
            return redirect()->route('errors.404')->with('advertencia', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
