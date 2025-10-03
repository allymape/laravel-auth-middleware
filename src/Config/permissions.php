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
 *   The unique identifier for the permission, typically used in youroadmin-rization logic.
 *
 * - **Description** (value of 'description')  
 *   Optional: A short human-readable explanation of what this permission grants.
 *
 * Example:
 * 'user' => [
 *     'index' => ['slug' => 'view-admin-user', 'description' => 'Allows viewing the list of users'],
 *     'create' => ['slug' => 'create-admin-user', 'description' => 'Allows creating new users'],
 *     ...
 * ]
 *
 * Usage:
 * Use this map in your middleware oroadmin-rization service to check if theeadmin-nticated user
 * has the required permission before accessing a controller method.
 */
return [
    'dashboard' => [
        'index' => ['slug' => 'view-admin-dashboard', 'module' => 'dashboard', 'description' => 'View dashboard'],
    ],
    'staff' => [
        'index' =>  ['slug' => 'view-admin-staff', 'module' => 'staff', 'description' => 'View list of staff members'],
        'create' => ['slug' => 'create-admin-staff', 'module' => 'staff', 'description' => 'Add a new staff member'],
        'update' => ['slug' => 'update-admin-staff', 'module' => 'staff', 'description' => 'Update staff member information'],
        'delete' => ['slug' => 'delete-admin-staff', 'module' => 'staff', 'description' => 'Remove a staff member from the system'],
    ],
    'user' => [
        'index' =>  ['slug' => 'view-admin-user', 'module' => 'user', 'description' => 'View list of users'],
        'update' => ['slug' => 'update-admin-user', 'module' => 'user', 'description' => 'Update user information'],
    ],
    'userprofile' => [
        'index' =>  ['slug' => 'view-admin-userprofile', 'module' => 'userprofile', 'description' => 'View user profile'],
        'update' => ['slug' => 'update-admin-userprofile', 'module' => 'userprofile', 'description' => 'Update user profile information'],
    ],
    'role' => [
        'index' =>  ['slug' => 'view-admin-role', 'module' => 'role', 'description' => 'View list of roles'],
        'create' => ['slug' => 'create-admin-role', 'module' => 'role', 'description' => 'Create a new role'],
        'update' => ['slug' => 'update-admin-role', 'module' => 'role', 'description' => 'Update role details'],
        'delete' => ['slug' => 'delete-admin-role', 'module' => 'role', 'description' => 'Delete a role from the system'],
    ],
    'permission' => [
        'index' =>  ['slug' => 'view-admin-permission', 'module' => 'permission', 'description' => 'View list of permissions'],
        'create' => ['slug' => 'create-admin-permission', 'module' => 'permission', 'description' => 'Create a new permission'],
        'update' => ['slug' => 'update-admin-permission', 'module' => 'permission', 'description' => 'Update permission details'],
        'delete' => ['slug' => 'delete-admin-permission', 'module' => 'permission', 'description' => 'Remove a permission from the system'],
    ],
    'institution' => [
        'index' => ['slug' => 'view-admin-institution', 'module' => 'institution', 'description' => 'View list of institutions'],
        'create' => ['slug' => 'create-admin-institution', 'module' => 'institution', 'description' => 'Create a new institution'],
        'update' => ['slug' => 'update-admin-institution', 'module' => 'institution', 'description' => 'Update institution details'],
        'delete' => ['slug' => 'delete-admin-institution', 'module' => 'institution', 'description' => 'Delete an institution from the system'],
    ],
    'department' => [
        'index' => ['slug' => 'view-admin-department', 'module' => 'department', 'description' => 'View list of departments'],
        'create' => ['slug' => 'create-admin-department', 'module' => 'department', 'description' => 'Create a new department'],
        'update' => ['slug' => 'update-admin-department', 'module' => 'department', 'description' => 'Update department details'],
        'delete' => ['slug' => 'delete-admin-department', 'module' => 'department', 'description' => 'Delete a department from the system'],
    ],
    'designation' => [
        'index' => ['slug' => 'view-admin-designation', 'module' => 'designation', 'description' => 'View list of designations'],
        'create' => ['slug' => 'create-admin-designation', 'module' => 'designation', 'description' => 'Create a new designation'],
        'update' => ['slug' => 'update-admin-designation', 'module' => 'designation', 'description' => 'Update designation details'],
        'delete' => ['slug' => 'delete-admin-designation', 'module' => 'designation', 'description' => 'Delete a designation from the system'],
    ],
    'announcement' => [
        'index' => ['slug' => 'view-admin-announcement', 'module' => 'announcement', 'description' => 'View announcements'],
        'create' => ['slug' => 'create-admin-announcement', 'module' => 'announcement', 'description' => 'Create a new announcement'],
        'update' => ['slug' => 'update-admin-announcement', 'module' => 'announcement', 'description' => 'Update announcement details'],
        'delete' => ['slug' => 'delete-admin-announcement', 'module' => 'announcement', 'description' => 'Delete an announcement'],
    ],
    'systems' => [
        'index' => ['slug' => 'view-admin-systems', 'module' => 'systems', 'description' => 'View system settings'],
        'create' => ['slug' => 'create-admin-systems', 'module' => 'systems', 'description' => 'Create system configuration'],
        'update' => ['slug' => 'update-admin-systems', 'module' => 'systems', 'description' => 'Update system configuration'],
        'delete' => ['slug' => 'delete-admin-systems', 'module' => 'systems', 'description' => 'Delete system configuration'],
    ],
    'documentation' => [
        'index' => ['slug' => 'view-admin-documentation', 'module' => 'documentation', 'description' => 'View documentation'],
        'create' => ['slug' => 'create-admin-documentation', 'module' => 'documentation', 'description' => 'Add new documentation'],
        'update' => ['slug' => 'update-admin-documentation', 'module' => 'documentation', 'description' => 'Update documentation'],
        'delete' => ['slug' => 'delete-admin-documentation', 'module' => 'documentation', 'description' => 'Delete documentation'],
    ],
    'services' => [
        'index' => ['slug' => 'view-admin-services', 'module' => 'services', 'description' => 'View services'],
        'create' => ['slug' => 'create-admin-services', 'module' => 'services', 'description' => 'Create new service'],
        'update' => ['slug' => 'update-admin-services', 'module' => 'services', 'description' => 'Update service details'],
        'delete' => ['slug' => 'delete-admin-services', 'module' => 'services', 'description' => 'Delete a service'],
    ],
    'sidebar' => [
        'index' => ['slug' => 'view-admin-sidebar', 'module' => 'sidebar', 'description' => 'View sidebar items'],
        'create' => ['slug' => 'create-admin-sidebar', 'module' => 'sidebar', 'description' => 'Add sidebar item'],
        'update' => ['slug' => 'update-admin-sidebar', 'module' => 'sidebar', 'description' => 'Update sidebar item'],
        'delete' => ['slug' => 'delete-admin-sidebar', 'module' => 'sidebar', 'description' => 'Delete sidebar item'],
    ],
    'region' => [
        'index' => ['slug' => 'view-admin-region', 'module' => 'region', 'description' => 'View regions'],
        'create' => ['slug' => 'create-admin-region', 'module' => 'region', 'description' => 'Create new region'],
    ],
    'council' => [
        'index' => ['slug' => 'view-admin-council', 'module' => 'council', 'description' => 'View councils'],
        'create' => ['slug' => 'create-admin-council', 'module' => 'council', 'description' => 'Create new council'],
    ],
    'wards' => [
        'index' => ['slug' => 'view-admin-wards', 'module' => 'wards', 'description' => 'View wards'],
        'create' => ['slug' => 'create-admin-wards', 'module' => 'wards', 'description' => 'Create new ward'],
    ],
    'street' => [
        'index' => ['slug' => 'view-admin-street', 'module' => 'street', 'description' => 'View streets'],
        'create' => ['slug' => 'create-admin-street', 'module' => 'street', 'description' => 'Create new street'],
    ],
    'attachement' => [
        'index' => ['slug' => 'view-admin-attachement', 'module' => 'attachement', 'description' => 'View attachments'],
        'create' => ['slug' => 'create-admin-attachement', 'module' => 'attachement', 'description' => 'Upload attachment'],
        'update' => ['slug' => 'update-admin-attachement', 'module' => 'attachement', 'description' => 'Update attachment'],
        'delete' => ['slug' => 'delete-admin-attachement', 'module' => 'attachement', 'description' => 'Delete attachment'],
    ]
];
