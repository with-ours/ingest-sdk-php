<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackContract;
use OursPrivacy\Track\TrackEventParams\DefaultProperties;
use OursPrivacy\Track\TrackEventParams\UserProperties;
use OursPrivacy\Track\TrackEventResponse;

/**
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Track\TrackEventParams\DefaultProperties
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Track\TrackEventParams\UserProperties
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
final class TrackService implements TrackContract
{
    /**
     * @api
     */
    public TrackRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrackRawService($client);
    }

    /**
     * @api
     *
     * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
     *
     * @param string $token The token for your Source. You can find this in the dashboard.
     * @param string $event The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $distinctID A unique identifier for the event. This helps prevent duplicate events.
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param array<string,string|null>|null $eventProperties any additional event properties you want to pass along
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param float|null $time The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     * @param UserProperties|UserPropertiesShape|null $userProperties Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function event(
        string $token,
        string $event,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $distinctID = null,
        ?string $email = null,
        ?array $eventProperties = null,
        ?string $externalID = null,
        ?float $time = null,
        ?string $userID = null,
        UserProperties|array|null $userProperties = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackEventResponse {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'event' => $event,
                'defaultProperties' => $defaultProperties,
                'distinctID' => $distinctID,
                'email' => $email,
                'eventProperties' => $eventProperties,
                'externalID' => $externalID,
                'time' => $time,
                'userID' => $userID,
                'userProperties' => $userProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->event(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
