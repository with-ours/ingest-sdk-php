<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
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
interface TrackContract
{
    /**
     * @api
     *
     * @param string $token The token for your Source. You can find this in the dashboard.
     * @param string $event The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $distinctID A unique identifier for this event used for deduplication. Highly recommended — if omitted, Ours will generate one for you, but supplying your own gives you stronger idempotency guarantees (e.g. a Stripe payment intent ID or your internal order ID).
     * @param string|null $email The email address of a user. Used as a fallback lookup when neither userId nor externalId is provided. We search your account for a visitor with this email and attach the event to them. If no match is found, a new visitor is created.
     * @param array<string,string|null>|null $eventProperties any additional event properties you want to pass along
     * @param string|null $externalID Your system's unique identifier for this user. We search your account for an existing visitor with this externalId and attach the event to them (resolving to their Ours Visitor ID). If no match is found, a new visitor is created. When present, email lookup is skipped. If you also have the userId from cookies or local storage, send both — it removes the lookup round-trip.
     * @param IdentityContext|IdentityContextShape|null $identityContext End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     * @param float|null $time The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     * @param string|null $userID The Ours Visitor ID stored in local storage and cookies on your web properties. When present, this is used directly — no lookup by externalId or email is performed. If you have both a userId and an externalId, send both so the event is attached to the right visitor without any lookup overhead.
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
    ): TrackEventResponse;
}
