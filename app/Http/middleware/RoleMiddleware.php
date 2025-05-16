<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Rol;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (request()->user()->rol->nombre !== $role) {
            return redirect()->route('errors.no-autorizado')->with('advertencia', 'No tienes permiso para acceder a esta página.');
        }
        return $next($request);
    }
}
