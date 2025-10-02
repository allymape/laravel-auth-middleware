<?php

namespace Mape\AuthMiddleware\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next, $permission = null)
    {
        $user = auth()->user();

        if (!$user || !$user->hasPermission($permission)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
