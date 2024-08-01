<?php

return [

    // General
    'welcome' => 'Welcome',
    'hello' => 'Hello, :name!',
    'goodbye' => 'Goodbye',

    // Authentication
    /*    'login' => [
            'failed' => 'These credentials do not match our records.',
            'success' => 'You have been successfully logged in!',
            'logout' => 'You have been successfully logged out!',
        ],*/

    // Errors
    'errors' => [
        '404' => 'Page not found.',
        '500' => 'Internal server error.',
        'not_found' => 'We couldn\'t find your account.',
        'not_same_pass_with_old' => 'You can\'t set new password with same as old password.',
    ],

    // Notifications
    'notifications' => [
        'new_message' => 'You have a new message from :sender.',
        'new_comment' => 'Someone commented on your post.',
    ],

    // User Management
    'user' => [
        'profile' => [
            'updated' => 'Your profile has been updated.',
            'password_updated' => 'Your password has been changed.',
        ],
        'email_verification' => [
            'sent' => 'Verification email sent!',
            'verified' => 'Your email has been verified!',
            'already_verified' => 'Your email is already verified.',
        ],
        'registered' => "Successfully registered. Please confirm your email."
    ],

    // Buttons
    'buttons' => [
        'save' => 'Save',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
    ],

    // Forms
    'forms' => [
        'contact' => [
            'name' => 'Name',
            'email' => 'Email',
            'username' => 'Username',
            'submit' => 'Submit',
        ],
    ],

];
