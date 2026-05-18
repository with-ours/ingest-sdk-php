<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Batch\BatchCreateParams\Event;
use OursPrivacy\Batch\BatchNewResponse;
use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\BatchContract;

/**
 * @phpstan-import-type EventShape from \OursPrivacy\Batch\BatchCreateParams\Event
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Send multiple `/track`-shaped events in a single request. The top-level token is authorized once for the full batch. Each batch row must include `distinctId`, and mixed validation or queue outcomes are reported per row.
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
    ): BatchNewResponse {
        $params = Util::removeNulls(['token' => $token, 'events' => $events]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
