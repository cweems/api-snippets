<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once('/path/to/twilio-php/Services/Twilio.php'); // Loads the library

use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$accountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$authToken = "your_auth_token";
$workspaceSid = "WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$taskSid = "WTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$reservationSid = "WRXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$client = new Client($accountSid, $authToken);

$workspace = $client->taskrouter->workspaces()->getContext($workspaceSid);

// redirect using a reservation
$reservation = $workspace->tasks($taskSid)
    ->reservations($reservationSid)->fetch();

$reservation->update(
    $reservation->reservationStatus,
    [
        'instruction' => 'Redirect',
        'redirectCallSid' => 'CA123456789',
        'redirectUrl' => 'http://example.com/assignment_redirect'
    ]
);
