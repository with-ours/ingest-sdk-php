<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\VisitorContract;
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
final class VisitorService implements VisitorContract
{
    /**
     * @api
     */
    public VisitorRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VisitorRawService($client);
    }

    /**
     * @api
     *
     * Set or update properties on an existing visitor, or create a new visitor if no match is found. This fires a $identify event, making the call visible in the event stream. Identity resolution runs in priority order: userId (direct, no lookup) → externalId (lookup by your ID) → email (fallback lookup). When a visitor is found, their Ours Visitor ID is used going forward so all future events are attached to the same profile. For top-level visitor properties: null clears the existing value, while undefined, omitted fields, and empty strings are ignored. For entries inside custom_properties: null, undefined, and empty strings are all ignored (custom_properties use merge semantics). See https://docs.oursprivacy.com/docs/data-types for details and common pitfalls.
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
    ): VisitorUpsertResponse {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'userProperties' => $userProperties,
                'defaultProperties' => $defaultProperties,
                'email' => $email,
                'externalID' => $externalID,
                'identityContext' => $identityContext,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
