<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackContract;
use OursPrivacy\Track\TrackEventParams\DefaultProperties;
use OursPrivacy\Track\TrackEventParams\IdentityContext;
use OursPrivacy\Track\TrackEventParams\UserProperties;
use OursPrivacy\Track\TrackEventResponse;

/**
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Track\TrackEventParams\DefaultProperties
 * @phpstan-import-type IdentityContextShape from \OursPrivacy\Track\TrackEventParams\IdentityContext
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
     * Track events from your server. Include userId, externalId, email, or userProperties.phone_number to associate the event with an existing visitor. Identity resolution runs in priority order: userId (direct, no lookup) → externalId → email → userProperties.phone_number. Each lookup runs only if earlier identifiers did not resolve a visitor. Phone matching ignores common formatting and an international + or 00 prefix, but does not infer a country code. If you know both userId and externalId, send both. For top-level visitor properties: null clears the existing value, while undefined, omitted fields, and empty strings are ignored. For entries inside custom_properties: null, undefined, and empty strings are all ignored (custom_properties use merge semantics). See https://docs.oursprivacy.com/docs/data-types for details and common pitfalls.
     *
     * @param string $token The token for your Source. You can find this in the dashboard.
     * @param string $event The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $distinctID A unique identifier for this event used for deduplication. Highly recommended — if omitted, Ours will generate one for you, but supplying your own gives you stronger idempotency guarantees (e.g. a Stripe payment intent ID or your internal order ID).
     * @param string|null $email The email address of a user. When userId is absent and externalId does not resolve a visitor, we search your account for a visitor with this email. If no match is found, we try userProperties.phone_number before creating a new visitor.
     * @param array<string,string|null>|null $eventProperties any additional event properties you want to pass along
     * @param string|null $externalID Your system's unique identifier for this user. When userId is absent, we search your account for an existing visitor with this externalId. If no match is found, we try email and then userProperties.phone_number before creating a new visitor. If you also have the userId from cookies or local storage, send both — it removes the lookup round-trip.
     * @param IdentityContext|IdentityContextShape|null $identityContext End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     * @param float|null $time The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     * @param string|null $userID The Ours Visitor ID stored in local storage and cookies on your web properties. When present, this is used directly — no lookup by externalId, email, or phone is performed. If you have both a userId and an externalId, send both so the event is attached to the right visitor without any lookup overhead.
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
        IdentityContext|array|null $identityContext = null,
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
                'identityContext' => $identityContext,
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
