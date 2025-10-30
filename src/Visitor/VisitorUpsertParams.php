<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor;

use OursPrivacy\Core\Attributes\Api;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;

/**
 * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
 *
 * @see OursPrivacy\Visitor->upsert
 *
 * @phpstan-type VisitorUpsertParamsShape = array{
 *   token: string,
 *   userProperties: UserProperties,
 *   defaultProperties?: DefaultProperties|null,
 *   email?: string|null,
 *   externalID?: string|null,
 *   userID?: string|null,
 * }
 */
final class VisitorUpsertParams implements BaseModel
{
    /** @use SdkModel<VisitorUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     */
    #[Api]
    public string $token;

    /**
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     */
    #[Api]
    public UserProperties $userProperties;

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    #[Api(nullable: true, optional: true)]
    public ?DefaultProperties $defaultProperties;

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $email;

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    #[Api('externalId', nullable: true, optional: true)]
    public ?string $externalID;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Api('userId', nullable: true, optional: true)]
    public ?string $userID;

    /**
     * `new VisitorUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VisitorUpsertParams::with(token: ..., userProperties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VisitorUpsertParams)->withToken(...)->withUserProperties(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $token,
        UserProperties $userProperties,
        ?DefaultProperties $defaultProperties = null,
        ?string $email = null,
        ?string $externalID = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        $obj->token = $token;
        $obj->userProperties = $userProperties;

        null !== $defaultProperties && $obj->defaultProperties = $defaultProperties;
        null !== $email && $obj->email = $email;
        null !== $externalID && $obj->externalID = $externalID;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    /**
     * The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    /**
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     */
    public function withUserProperties(UserProperties $userProperties): self
    {
        $obj = clone $this;
        $obj->userProperties = $userProperties;

        return $obj;
    }

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    public function withDefaultProperties(
        ?DefaultProperties $defaultProperties
    ): self {
        $obj = clone $this;
        $obj->defaultProperties = $defaultProperties;

        return $obj;
    }

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj->externalID = $externalID;

        return $obj;
    }

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
