<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\VisitorRawContract;
use OursPrivacy\Visitor\VisitorUpsertParams;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;
use OursPrivacy\Visitor\VisitorUpsertResponse;

/**
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class VisitorRawService implements VisitorRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
     *
     * @param array{
     *   token: string,
     *   userProperties: UserProperties|UserPropertiesShape,
     *   defaultProperties?: DefaultProperties|DefaultPropertiesShape|null,
     *   email?: string|null,
     *   externalID?: string|null,
     *   userID?: string|null,
     * }|VisitorUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VisitorUpsertResponse>
     *
     * @throws APIException
     */
    public function upsert(
        array|VisitorUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VisitorUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'identify' : 'https://api.oursprivacy.com/api/v1/identify';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: VisitorUpsertResponse::class,
        );
    }
}
