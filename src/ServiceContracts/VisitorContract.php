<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\IdentityContext;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;
use OursPrivacy\Visitor\VisitorUpsertResponse;

/**
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties
 * @phpstan-import-type IdentityContextShape from \OursPrivacy\Visitor\VisitorUpsertParams\IdentityContext
 * @phpstan-import-type RequestOpts from \OursPrivacy\RequestOptions
 */
interface VisitorContract
{
    /**
     * @api
     *
     * @param string $token The token for your Source. You can find this in the dashboard.
     * @param UserProperties|UserPropertiesShape $userProperties User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $email The email address of a user. Used as a fallback lookup when neither userId nor externalId is provided. We search your account for a visitor with this email and attach the event to them. If no match is found, a new visitor is created.
     * @param string|null $externalID Your system's unique identifier for this user. We search your account for an existing visitor with this externalId and attach the event to them (resolving to their Ours Visitor ID). If no match is found, a new visitor is created. When present, email lookup is skipped. If you also have the userId from cookies or local storage, send both — it removes the lookup round-trip.
     * @param IdentityContext|IdentityContextShape|null $identityContext End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     * @param string|null $userID The Ours Visitor ID stored in local storage and cookies on your web properties. When present, this is used directly — no lookup by externalId or email is performed. If you have both a userId and an externalId, send both so the event is attached to the right visitor without any lookup overhead.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        string $token,
        UserProperties|array $userProperties,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $email = null,
        ?string $externalID = null,
        IdentityContext|array|null $identityContext = null,
        ?string $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): VisitorUpsertResponse;
}
