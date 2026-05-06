<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Batch\BatchCreateParams\Event;
use OursPrivacy\Batch\BatchNewResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;

/**
 * @phpstan-import-type EventShape from \OursPrivacy\Batch\BatchCreateParams\Event
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param string $token The token for your Source. You can find this in the dashboard.
     * @param list<Event|EventShape> $events a list of `/track`-shaped events to validate and enqueue together
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $token,
        array $events,
        RequestOptions|array|null $requestOptions = null,
    ): BatchNewResponse;
}
