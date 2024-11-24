<?php
return [
    'module_name' => 'Password Change By Email',
    'module_description' => 'Allows users to reset their password using a verification code sent to their email.',
    'time_limit' => 'Time Limit for Code (minutes)',
    'time_limit_description' => 'The time limit for the reset code validity in minutes.',
    'max_requests' => 'Max Requests Per Hour',
    'max_requests_description' => 'The maximum number of reset code requests allowed per hour for a user.',
    'email_not_found' => 'Email address not found.',
    'recent_request' => 'A reset code has already been requested recently. Please wait before requesting again.',
    'reset_code_subject' => 'Password Reset Code',
    'reset_code_message' => 'Your password reset code is: ',
    'reset_code_sent' => 'A reset code has been sent to your email.',
    'reset_code_expired' => 'The reset code has expired. Please request a new one.',
    'invalid_reset_code' => 'Invalid reset code.',
    'password_strength_error' => 'Password must be at least 8 characters long and include an uppercase letter, a number, and a special character.',
    'password_updated' => 'Password has been successfully updated.',
    'max_requests_exceeded' => 'Maximum number of reset code requests exceeded. Please try again later.'
];
