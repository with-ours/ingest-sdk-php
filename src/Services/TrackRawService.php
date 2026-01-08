<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackRawContract;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventParams\DefaultProperties;
use OursPrivacy\Track\TrackEventParams\UserProperties;
use OursPrivacy\Track\TrackEventResponse;

/**
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Track\TrackEventParams\DefaultProperties
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Track\TrackEventParams\UserProperties
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class TrackRawService implements TrackRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
     *
     * @param array{
     *   token: string,
     *   event: string,
     *   defaultProperties?: DefaultProperties|DefaultPropertiesShape|null,
     *   distinctID?: string|null,
     *   email?: string|null,
     *   eventProperties?: array<string,string|null>|null,
     *   externalID?: string|null,
     *   time?: float|null,
     *   userID?: string|null,
     *   userProperties?: UserProperties|UserPropertiesShape|null,
     * }|TrackEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackEventResponse>
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackEventParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'track' : 'https://api.oursprivacy.com/api/v1/track';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: TrackEventResponse::class,
        );
    }
}
