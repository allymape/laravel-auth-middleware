<?php

namespace Mape\AuthMiddleware\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next, $permission = null)
    {
        $user = $request->get('auth_user');
        // Get current controller and method
        $action = $request->route()->getActionName();
        [$controller, $method] = explode('@', class_basename($action));
        // Normalize controller name (match your config keys)
        $controller = strtolower($controller); // e.g. AuthController => authcontroller
        $method = strtolower($method); // e.g. AuthController => authcontroller
        // Load permissions map from config
        $map = config('permissions');
        $permission = $map[Str::replace('controller', '', $controller)][$method]['slug'] ?? null;
        if (
            !$user ||
            !isset($user['roles']) ||
            !isset($user['permissions'])
        ) {
            return response()->json([
                'success' => false,
                'status'  => 'error',
                'code'    => 403,
                'message' => 'Unauthorized',
                'data'    => null
            ], 403);
        }
        if (!in_array($permission, $user['permissions'])) {
            return response()->json([
                'success' => false,
                'status'  => 'error',
                'code'    => 403,
                'message' => 'Forbidden - missing permission: ' . $permission,
                'data'    => null
            ], 403);
        }
        return $next($request);
    }
}
