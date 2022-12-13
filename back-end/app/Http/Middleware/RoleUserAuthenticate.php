<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleUserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $respone['message'] = "Unauthenticated";
        if (!auth('api-admin')->check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return response()->json($respone, 401);

        $user = auth('api-admin')->user();

        if ($user->isAdmin())
            return $next($request);

        foreach ($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if ($user->hasRole($role))
                return $next($request);
        }

        return response()->json($respone, 401);
    }
}
