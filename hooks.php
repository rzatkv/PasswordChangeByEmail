<?php

use WHMCS\Auth;
use WHMCS\Mail;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaPage', 1, function($vars) {
    $lang = isset($_SESSION['Language']) ? $_SESSION['Language'] : 'english';
    $translations = include __DIR__ . "/lang/{$lang}.php";
    $config = PasswordChangeByEmail_config();
    $timeLimit = $config['fields']['time_limit']['Default'];
    $maxRequests = $config['fields']['max_requests']['Default'];

    if (isset($_POST['request_reset_code'])) {
        $email = $_POST['email'];

        // Find user by email
        $client = Capsule::table('tblclients')->where('email', $email)->first();

        if (!$client) {
            return ['error' => $translations['email_not_found']];
        }

        // Check if the user has exceeded the max request limit
        $requestCount = Capsule::table('mod_password_change_by_email')->where('client_id', $client->id)->where('password_reset_requested_at', '>=', Carbon::now()->subHour())->count();
        if ($requestCount >= $maxRequests) {
            return ['error' => $translations['max_requests_exceeded']];
        }

        // Check if the user has recently requested a code
        $lastRequestTime = Capsule::table('mod_password_change_by_email')->where('client_id', $client->id)->value('password_reset_requested_at');
        if ($lastRequestTime && Carbon::parse($lastRequestTime)->addMinutes($timeLimit)->isFuture()) {
            return ['error' => $translations['recent_request']];
        }

        // Generate a unique reset code
        $resetCode = rand(100000, 999999);
        Capsule::table('mod_password_change_by_email')->updateOrInsert(
            ['client_id' => $client->id],
            [
                'password_reset_code' => password_hash($resetCode, PASSWORD_DEFAULT),
                'password_reset_requested_at' => Carbon::now()->toDateTimeString()
            ]
        );

        // Send email
        Mail::send(["to" => $email, "subject" => $translations['reset_code_subject'], "message" => $translations['reset_code_message'] . $resetCode]);

        return ['success' => $translations['reset_code_sent']];
    }

    if (isset($_POST['verify_reset_code'])) {
        $email = $_POST['email'];
        $resetCode = $_POST['reset_code'];
        $newPassword = $_POST['new_password'];

        // Find user by email
        $client = Capsule::table('tblclients')->where('email', $email)->first();

        if (!$client) {
            return ['error' => $translations['email_not_found']];
        }

        // Check if the reset code is still valid
        $resetData = Capsule::table('mod_password_change_by_email')->where('client_id', $client->id)->first();
        if (!$resetData || Carbon::parse($resetData->password_reset_requested_at)->addMinutes($timeLimit)->isPast()) {
            return ['error' => $translations['reset_code_expired']];
        }

        // Verify reset code
        if (!password_verify($resetCode, $resetData->password_reset_code)) {
            return ['error' => $translations['invalid_reset_code']];
        }

        // Validate new password strength
        if (strlen($newPassword) < 8 || !preg_match('/[A-Z]/', $newPassword) || !preg_match('/[0-9]/', $newPassword) || !preg_match('/[!@#$%^&*]/', $newPassword)) {
            return ['error' => $translations['password_strength_error']];
        }

        // Update password
        $auth = new Auth();
        $auth->generateClientLoginHash($client->id, $newPassword);
        Capsule::table('mod_password_change_by_email')->where('client_id', $client->id)->delete();

        return ['success' => $translations['password_updated']];
    }
});