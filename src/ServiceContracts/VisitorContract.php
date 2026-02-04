<?php

declare(strict_types=1);

namespace OursPrivacy\ServiceContracts;

use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;
use OursPrivacy\Visitor\VisitorUpsertResponse;

/**
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties
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
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
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
        ?string $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): VisitorUpsertResponse;
}
