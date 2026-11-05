<?php

// Send one track event to Ours Privacy and print the result.
//
// Install the SDK and an HTTP client:
//   composer require oursprivacy/ingest-sdk guzzlehttp/guzzle
// Run with your Source token:
//   OURS_PRIVACY_TOKEN=your-source-token php examples/track_event.php
// Events go to production unless OURS_PRIVACY_BASE_URL is set.
// Sample values only. Do not put personal or health data in event properties.

require __DIR__.'/../vendor/autoload.php'; // adjust if you move this file

use OursPrivacy\Client;

$token = getenv('OURS_PRIVACY_TOKEN');
if (!is_string($token) || '' === $token) {
    fwrite(STDERR, "Set OURS_PRIVACY_TOKEN to your Source token\n");

    exit(1);
}

$client = new Client(baseUrl: getenv('OURS_PRIVACY_BASE_URL') ?: null);

$response = $client->track->event(
    token: $token,
    event: 'Example Signup', // must be allowed on your Source
    externalID: 'example-user-123', // your own identifier for this visitor
    eventProperties: ['plan' => 'starter', 'quantity' => 1],
);

echo 'tracked: ', var_export($response->success, true), "\n";
