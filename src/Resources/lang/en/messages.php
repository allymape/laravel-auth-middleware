<?php

return [
    'user' => [
        'created'     => 'User created successfully.',
        'updated'     => 'User updated successfully.',
        'deleted'     => 'User deleted successfully.',
        'not_found'   => 'User not found.',
        'unauthorized' => 'You are not authorized to manage users.',
    ],

    'auth' => [
        'login_success'   => 'Login successful.',
        'login_failed'    => 'Invalid email or password.',
        'unauthenticated' => 'You must be logged in to access this resource.',
        'logout_successful' => 'User successfully logged out.'
    ],
    'email' => [
        'unverified'   => 'Please verify your email.',
        'verified'   => 'You email is verified successful.',
        'success' => 'Email was sent successful.',
        'failed' => 'Unable to send email.'
    ],

    'phone' => [
        'unverified'   => 'Please verify phone number.',
        'verified'   => 'Your phone number is verified successful.',
    ],
    'email_or_phone' => [
        'unverified'   => 'Please verify your email or phone number.',
    ],
    'permission' => [
        'unauthorized' => 'You are not authorized to perform this action',
        'forbidden'    => 'You do not have permission to access this resource.',
        'role_missing' => 'Your role does not allow this operation.',
    ],
    'token' => [
        'expired'  => 'Token is already invalid or expired, please login again.',
        'invalid'  => 'Invalid token provided.',
        'missing'  => 'Token is missing from the request.',
        'unauthorized' => 'You are not authorized with this token.',
        'creation_failed'    => 'Could not create token.',
    ],
    'system' => [
        'unexpected_error' => 'Something went wrong, please try again later.',
        'maintenance'      => 'System is under maintenance, please try again soon.',
    ],

    'validation' => [
        'invalid_request' => 'The data provided is invalid.',
        'missing_fields'  => 'Some required fields are missing.',
    ],
    'api_key' => [
        'un_authorized' => 'Unauthorized. Invalid API key'
    ]
];
