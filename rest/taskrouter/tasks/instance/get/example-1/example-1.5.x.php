<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once('/path/to/twilio-php/Services/Twilio.php'); // Loads the library

use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$accountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$authToken = "your_auth_token";
$workspaceSid = "WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$taskSid = "WTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$client = new Client($accountSid, $authToken);

$workspace = $client->taskrouter->workspaces()->getContext($workspaceSid);

$task = $workspace->tasks($taskSid)->fetch();

echo $task->attributes;
