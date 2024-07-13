<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route_name = $request->route()->getName();

        $routes_arr = auth()->user()->role->permissions->toArray();

        foreach ($routes_arr as $route) {
            if ($route['name'] == $route_name) {
                return $next($request);
            }
        }
        abort(403, 'ACESSO NEGADO | NÃO AUTORIZADO');

    }
}
