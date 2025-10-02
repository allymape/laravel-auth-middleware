<?php

namespace Mape\AuthMiddleware\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ValidateToken
{
    public function handle($request, Closure $next)
    {
        try {
            // Get token from Authorization header
            $token = $request->bearerToken();
            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'code'   => 401,
                    'message' => 'No token provided',
                    'data'   => null
                ], 401);
            }

            try {
                // Parse and validate token
                $payload = JWTAuth::setToken($token)->getPayload();

                // Extract user data from payload
                $user = [
                    'id'    => $payload->get('sub'),
                    // 'email' => $payload->get('email'),
                    'roles' => $payload->get('roles'),
                    'permissions' => $payload->get('permissions'),
                ];
            } catch (JWTException $e) {
                return response()->json([
                    'status'  => 'error',
                    'code'    => 401,
                    'message' => 'Invalid or expired token',
                    'data'    => null
                ], 401);
            }

            if (!$user || empty($user['id'])) {
                return response()->json([
                    'status'  => 'error',
                    'code'    => 401,
                    'message' => 'User not found',
                    'data'    => null
                ], 401);
            }
            // Attach user to request
            $request->merge(['auth_user' => $user]);
            \Log::info('User token validated');
            return $next($request);
        } catch (\Exception $e) {
            \Log::error('Token validation error', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString()
            ]);

            return response()->json([
                'status'  => 'error',
                'code'    => 500,
                'message' => 'Internal server error',
                'data'    => null
            ], 500);
        }
    }
}
