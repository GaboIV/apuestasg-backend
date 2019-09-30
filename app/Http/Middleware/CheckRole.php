<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode("-", $roles);
        
        foreach($roles as $role) { 
            if ($request->user()->hasRole($role)) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Acceso denegado'], 401); 
    }
}
