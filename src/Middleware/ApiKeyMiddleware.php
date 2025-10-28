<?php

namespace Mape\AuthMiddleware\Middleware;
use Closure;
class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check for API key in the request header
        $apiKey = $request->header('x-api-key');
        // Get API key from config
        $validApiKey = config('app.api_key');
        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
                'status' => 'error'
            ], 401);
        }
        return $next($request);
    }
}
