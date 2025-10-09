<?php

namespace Mape\AuthMiddleware;

use Illuminate\Support\ServiceProvider;
use Mape\AuthMiddleware\Middleware\ValidateToken;
use Mape\AuthMiddleware\Middleware\CheckPermission;
use Mape\AuthMiddleware\Middleware\ApiKeyMiddleware;

class AuthMiddlewareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__ . '/Config/permissions.php',
            'permissions'
        );
    }

    public function boot(): void
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/Config/permissions.php' => config_path('permissions.php'),
        ], 'config');

        // Publish middleware
        $this->publishes([
            __DIR__ . '/Middleware/CheckPermission.php' => app_path('Http/Middleware/CheckPermission.php'),
        ], 'middleware');

        // Register middleware aliases
        $this->app['router']->aliasMiddleware('api.key', ApiKeyMiddleware::class);
        $this->app['router']->aliasMiddleware('validate.token', ValidateToken::class);
        $this->app['router']->aliasMiddleware('check.permission', CheckPermission::class);
    }
}
