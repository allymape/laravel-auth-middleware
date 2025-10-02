<?php

/**
 * Permissions Map
 *
 * This configuration defines the mapping between controller actions and their corresponding permissions.
 *
 * Structure:
 * [
 *   'controllerName' => [
 *       'methodName' => [
 *           'slug' => 'permission-identifier',
 *           'description' => 'Brief explanation of what this permission allows'
 *       ]
 *   ]
 * ]
 *
 * Details:
 * - **Controller Name** (array key, e.g., 'user', 'role', 'permission')  
 *   Represents the name of the controller. It should match your controller file (without "Controller" suffix).
 *
 * - **Method Name** (nested key, e.g., 'index', 'create', 'update', 'delete')  
 *   Represents the action or method inside the controller that requires permission checking.
 *
 * - **Slug** (value of 'slug')  
 *   The unique identifier for the permission, typically used in your authorization logic.
 *
 * - **Description** (value of 'description')  
 *   Optional: A short human-readable explanation of what this permission grants.
 *
 * Example:
 * 'user' => [
 *     'index' => ['slug' => 'view-auth-user', 'description' => 'Allows viewing the list of users'],
 *     'create' => ['slug' => 'create-auth-user', 'description' => 'Allows creating new users'],
 *     ...
 * ]
 *
 * Usage:
 * Use this map in your middleware or authorization service to check if the authenticated user
 * has the required permission before accessing a controller method.
 */
return [
    'user' => [
        'index' =>  ['slug' => 'view-auth-user', 'description' => ''],
        'create' => ['slug' => 'create-auth-user', 'description' => ''],
        'update' => ['slug' => 'update-auth-User', 'description' => ''],
        'delete' => ['slug' => 'delete-auth-user', 'description' => ''],
    ],
    'role' => [
        'index' =>  ['slug' => 'view-auth-role', 'description' => ''],
        'create' => ['slug' => 'create-auth-role', 'description' => ''],
        'update' => ['slug' => 'update-auth-role', 'description' => ''],
        'delete' => ['slug' => 'delete-auth-role', 'description' => ''],
    ],
    'permission' => [
        'index' =>  ['slug' => 'view-auth-permission', 'description' => ''],
        'create' => ['slug' => 'create-auth-permission', 'description' => ''],
        'update' => ['slug' => 'update-auth-permission', 'description' => ''],
        'delete' => ['slug' => 'delete-auth-permission', 'description' => ''],
    ],
];
