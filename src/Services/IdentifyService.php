<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Identify\IdentifyCreateOrUpdateParams;
use OursPrivacy\Identify\IdentifyCreateOrUpdateParams\DefaultProperties;
use OursPrivacy\Identify\IdentifyCreateOrUpdateParams\UserProperties;
use OursPrivacy\Identify\IdentifyNewOrUpdateResponse;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\IdentifyContract;

use const OursPrivacy\Core\OMIT as omit;

final class IdentifyService implements IdentifyContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
     *
     * @param string $token The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     * @param UserProperties $userProperties User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     * @param DefaultProperties|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     *
     * @throws APIException
     */
    public function createOrUpdate(
        $token,
        $userProperties,
        $defaultProperties = omit,
        $email = omit,
        $externalID = omit,
        $userID = omit,
        ?RequestOptions $requestOptions = null,
    ): IdentifyNewOrUpdateResponse {
        $params = [
            'token' => $token,
            'userProperties' => $userProperties,
            'defaultProperties' => $defaultProperties,
            'email' => $email,
            'externalID' => $externalID,
            'userID' => $userID,
        ];

        return $this->createOrUpdateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrUpdateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IdentifyNewOrUpdateResponse {
        [$parsed, $options] = IdentifyCreateOrUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'identify' : 'https://api.oursprivacy.com/api/v1/identify';

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: IdentifyNewOrUpdateResponse::class,
        );
    }
}
