<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Batch\BatchCreateParams;
use OursPrivacy\Batch\BatchCreateParams\Event;
use OursPrivacy\Batch\BatchNewResponse;
use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\BatchRawContract;

/**
 * @phpstan-import-type EventShape from \OursPrivacy\Batch\BatchCreateParams\Event
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send multiple `/track`-shaped events in a single request. The top-level token is authorized once for the full batch. Each batch row must include `distinctId`, and mixed validation or queue outcomes are reported per row.
     *
     * @param array{
     *   token: string, events: list<Event|EventShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'batch' : 'https://api.oursprivacy.com/api/v1/batch';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: BatchNewResponse::class,
        );
    }
}
