<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackContract;
use OursPrivacy\Track\TrackCreateEventParams;
use OursPrivacy\Track\TrackCreateEventParams\DefaultProperties;
use OursPrivacy\Track\TrackCreateEventParams\UserProperties;
use OursPrivacy\Track\TrackNewEventResponse;

use const OursPrivacy\Core\OMIT as omit;

final class TrackService implements TrackContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
     *
     * @param string $token The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     * @param string $event The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     * @param DefaultProperties|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $distinctID A unique identifier for the event. This helps prevent duplicate events.
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param array<string,
     * mixed,>|null $eventProperties Any additional event properties you want to pass along
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param float|null $time The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     * @param UserProperties|null $userProperties Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     *
     * @throws APIException
     */
    public function createEvent(
        $token,
        $event,
        $defaultProperties = omit,
        $distinctID = omit,
        $email = omit,
        $eventProperties = omit,
        $externalID = omit,
        $time = omit,
        $userID = omit,
        $userProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): TrackNewEventResponse {
        $params = [
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
        ];

        return $this->createEventRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createEventRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TrackNewEventResponse {
        [$parsed, $options] = TrackCreateEventParams::parseRequest(
            $params,
            $requestOptions
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'track' : 'https://api.oursprivacy.com/api/v1/track';

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: TrackNewEventResponse::class,
        );
    }
}
