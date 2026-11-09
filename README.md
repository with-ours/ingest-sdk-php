# Ours Privacy PHP API library

The Ours Privacy PHP library provides convenient access to the Ours Privacy REST API from any PHP 8.1.0+ application.

It is generated with [Stainless](https://www.stainless.com/).

## Documentation

The REST API documentation can be found on [docs.oursprivacy.com](https://docs.oursprivacy.com).

`token` is the Source token from your Ours Privacy dashboard. Events must be allow-listed: an event that isn't on your [Event Allowlist](https://docs.oursprivacy.com/docs/allow-listing-events) isn't forwarded to your destinations.

See the [SDK guide](https://docs.oursprivacy.com/docs/php) and the runnable code in [`examples`](examples).

## Installation

<!-- x-release-please-start-version -->

```
composer require "oursprivacy/ingest-sdk 1.25.0" guzzlehttp/guzzle
```

<!-- x-release-please-end -->

The SDK needs a PSR-18 HTTP client, and Composer won't add one by itself, so this installs Guzzle; to let `php-http/discovery` install one instead, run `composer config allow-plugins.php-http/discovery true` before requiring the SDK.

## Usage

This library uses named parameters to specify optional arguments.
Parameters with a default value must be set by name.

```php
<?php

use OursPrivacy\Client;

$client = new Client();

$response = $client->track->event(
  token: 'YOUR_SOURCE_TOKEN',
  event: 'signup_completed',
  distinctID: 'evt_01J9ZK3Q7X',
  eventProperties: ['plan' => 'pro', 'value' => 49, 'currency' => 'USD'],
  externalID: 'crm_contact_1042',
  identityContext: ['ip' => '203.0.113.10', 'userAgent' => 'Mozilla/5.0'],
);

var_dump($response->success);
```

### Identify a visitor

Set properties on a visitor, creating the visitor if there's no match.

```php
<?php

use OursPrivacy\Client;

$client = new Client();

$response = $client->visitor->upsert(
  token: 'YOUR_SOURCE_TOKEN',
  userProperties: ['firstName' => 'Sample', 'lastName' => 'User'],
  email: 'user@example.com',
);

var_dump($response->success);
```

### Send a batch of events

Send many events in one request, each with its own required `distinctId`.

```php
<?php

use OursPrivacy\Client;

$client = new Client();

$batch = $client->batch->create(
  token: 'YOUR_SOURCE_TOKEN',
  events: [
    [
      'event' => 'signup_completed',
      'distinctID' => 'evt_01J9ZK3Q7X',
      'externalID' => 'crm_contact_1042',
    ],
    [
      'event' => 'plan_upgraded',
      'distinctID' => 'evt_01J9ZK3Q8Y',
      'externalID' => 'crm_contact_1042',
    ],
  ],
);

var_dump($batch->accepted);
```

A partial success returns HTTP 207 with a result for each row. Retry only the rows whose `code` is `queue_failed`, with the same `distinctId`. You can backfill events up to one year old; older `time` values are clamped.

```php
// $events is the array you sent. Successful rows have no `code`, so read it with `??`.
$retry = [];
foreach ($batch->results as $row) {
    if (($row->code ?? null) === 'queue_failed') {
        $retry[] = $events[$row->index];
    }
}
```

### Get an experiment assignment

Look up a visitor's variant, using the experiment's `exp_*` token rather than the Source token.

```php
<?php

use OursPrivacy\Client;

$client = new Client();

$response = $client->experiments->assignment(
  'checkout_redesign',
  token: 'exp_YOUR_EXPERIMENT_TOKEN',
  visitorID: 'visitor_1042',
);

var_dump($response);
```

### Further reading

The docs cover each endpoint in full.

- [Track](https://docs.oursprivacy.com/docs/reference/track)
- [Identify](https://docs.oursprivacy.com/docs/reference/identify)
- [Batch](https://docs.oursprivacy.com/docs/reference/batch)
- [Rate limits](https://docs.oursprivacy.com/docs/reference/rate-limits)
- [Server-side experimentation](https://docs.oursprivacy.com/docs/experimentation/server-side)

### Handling errors

When the library is unable to connect to the API, or if the API returns a non-success status code (i.e., 4xx or 5xx response), a subclass of `OursPrivacy\Core\Exceptions\APIException` will be thrown:

```php
<?php

use OursPrivacy\Core\Exceptions\APIConnectionException;
use OursPrivacy\Core\Exceptions\RateLimitException;
use OursPrivacy\Core\Exceptions\APIStatusException;

try {
  $response = $client->track->event(token: 'REPLACE_ME', event: 'REPLACE_ME');
} catch (APIConnectionException $e) {
  echo "The server could not be reached", PHP_EOL;
  var_dump($e->getPrevious());
} catch (RateLimitException $e) {
  echo "A 429 status code was received; we should back off a bit.", PHP_EOL;
} catch (APIStatusException $e) {
  echo "Another non-200-range status code was received", PHP_EOL;
  echo $e->getMessage();
}
```

Error codes are as follows:

| Cause            | Error Type                     |
| ---------------- | ------------------------------ |
| HTTP 400         | `BadRequestException`          |
| HTTP 401         | `AuthenticationException`      |
| HTTP 403         | `PermissionDeniedException`    |
| HTTP 404         | `NotFoundException`            |
| HTTP 409         | `ConflictException`            |
| HTTP 422         | `UnprocessableEntityException` |
| HTTP 429         | `RateLimitException`           |
| HTTP >= 500      | `InternalServerException`      |
| Other HTTP error | `APIStatusException`           |
| Timeout          | `APITimeoutException`          |
| Network error    | `APIConnectionException`       |

### Retries

Certain errors will be automatically retried 2 times by default, with a short exponential backoff.

Connection errors (for example, due to a network connectivity problem), 408 Request Timeout, 409 Conflict, 429 Rate Limit, >=500 Internal errors, and timeouts will all be retried by default.

You can use the `maxRetries` option to configure or disable this:

```php
<?php

use OursPrivacy\Client;

// Configure the default for all requests:
$client = new Client(requestOptions: ['maxRetries' => 0]);

// Or, configure per-request:
$result = $client->track->event(
  token: 'REPLACE_ME', event: 'REPLACE_ME', requestOptions: ['maxRetries' => 5]
);
```

## Advanced concepts

### Making custom or undocumented requests

#### Undocumented properties

You can send undocumented parameters to any endpoint, and read undocumented response properties, like so:

Note: the `extra*` parameters of the same name overrides the documented parameters.

```php
<?php

$response = $client->track->event(
  token: 'REPLACE_ME',
  event: 'REPLACE_ME',
  requestOptions: [
    'extraQueryParams' => ['my_query_parameter' => 'value'],
    'extraBodyParams' => ['my_body_parameter' => 'value'],
    'extraHeaders' => ['my-header' => 'value'],
  ],
);
```

#### Undocumented request params

If you want to explicitly send an extra param, you can do so with the `extra_query`, `extra_body`, and `extra_headers` under the `request_options:` parameter when making a request, as seen in the examples above.

#### Undocumented endpoints

To make requests to undocumented endpoints while retaining the benefit of auth, retries, and so on, you can make requests using `client.request`, like so:

```php
<?php

$response = $client->request(
  method: "post",
  path: '/undocumented/endpoint',
  query: ['dog' => 'woof'],
  headers: ['useful-header' => 'interesting-value'],
  body: ['hello' => 'world']
);
```

## Versioning

This package follows [SemVer](https://semver.org/spec/v2.0.0.html) conventions.

This package considers improvements to the (non-runtime) PHPDoc type definitions to be non-breaking changes.

## Requirements

PHP 8.1.0 or higher.
