<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use WHMCS\Auth;
use WHMCS\Mail;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

function PasswordChangeByEmail_config() {
    return [
        'name' => 'PasswordChangeByEmail',
        'description' => 'Allows users to reset their password using a verification code sent to their email.',
        'author' => 'RezaKarimi',
        'version' => '1.0.0',
        'fields' => [
            'time_limit' => [
                'FriendlyName' => 'Time Limit for Code (minutes)',
                'Type' => 'text',
                'Size' => '5',
                'Default' => '10',
                'Description' => 'The time limit for the reset code validity in minutes.',
            ],
            'max_requests' => [
                'FriendlyName' => 'Max Requests Per Hour',
                'Type' => 'text',
                'Size' => '5',
                'Default' => '5',
                'Description' => 'The maximum number of reset code requests allowed per hour for a user.',
            ],
        ]
    ];
}

function PasswordChangeByEmail_activate() {
    try {
        Capsule::schema()->create('mod_password_change_by_email', function ($table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('password_reset_code');
            $table->timestamp('password_reset_requested_at');
        });
        return [
            'status' => 'success',
            'description' => 'PasswordChangeByEmail module activated successfully.'
        ];
    } catch (\Exception $e) {
        return [
            'status' => 'error',
            'description' => 'Unable to create the required database table: ' . $e->getMessage()
        ];
    }
}

function PasswordChangeByEmail_deactivate() {
    try {
        Capsule::schema()->dropIfExists('mod_password_change_by_email');
        return [
            'status' => 'success',
            'description' => 'PasswordChangeByEmail module deactivated successfully.'
        ];
    } catch (\Exception $e) {
        return [
            'status' => 'error',
            'description' => 'Unable to drop the required database table: ' . $e->getMessage()
        ];
    }
}

function PasswordChangeByEmail_output($vars) {
    // Fetch reset requests for admin view
    $resetRequests = Capsule::table('mod_password_change_by_email')
        ->join('tblclients', 'mod_password_change_by_email.client_id', '=', 'tblclients.id')
        ->select('tblclients.firstname', 'tblclients.lastname', 'tblclients.email', 'mod_password_change_by_email.password_reset_requested_at')
        ->get();

    // Display in admin area
    echo '<h2>Password Reset Requests</h2>';
    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Request Time</th>
                </tr>
            </thead>
            <tbody>';
    foreach ($resetRequests as $request) {
        echo '<tr>
                <td>' . $request->firstname . '</td>
                <td>' . $request->lastname . '</td>
                <td>' . $request->email . '</td>
                <td>' . $request->password_reset_requested_at . '</td>
              </tr>';
    }
    echo '</tbody>
          </table>';
}
