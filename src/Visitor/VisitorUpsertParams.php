<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\IdentityContext;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;

/**
 * Define visitor properties on an existing visitor or create a new visitor. This fires a $identify event, making the call visible in the event stream. For top-level visitor properties: null clears the existing value, while undefined, omitted fields, and empty strings are ignored. For entries inside custom_properties: null, undefined, and empty strings are all ignored (custom_properties use merge semantics). See https://docs.oursprivacy.com/docs/data-types for details and common pitfalls.
 *
 * @see OursPrivacy\Services\VisitorService::upsert()
 *
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties
 * @phpstan-import-type IdentityContextShape from \OursPrivacy\Visitor\VisitorUpsertParams\IdentityContext
 *
 * @phpstan-type VisitorUpsertParamsShape = array{
 *   token: string,
 *   userProperties: UserProperties|UserPropertiesShape,
 *   defaultProperties?: null|DefaultProperties|DefaultPropertiesShape,
 *   email?: string|null,
 *   externalID?: string|null,
 *   identityContext?: null|IdentityContext|IdentityContextShape,
 *   userID?: string|null,
 * }
 */
final class VisitorUpsertParams implements BaseModel
{
    /** @use SdkModel<VisitorUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The token for your Source. You can find this in the dashboard.
     */
    #[Required]
    public string $token;

    /**
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     */
    #[Required]
    public UserProperties $userProperties;

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    #[Optional(nullable: true)]
    public ?DefaultProperties $defaultProperties;

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    #[Optional('externalId', nullable: true)]
    public ?string $externalID;

    /**
     * End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     */
    #[Optional(nullable: true)]
    public ?IdentityContext $identityContext;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Optional('userId', nullable: true)]
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
     *
     * @param UserProperties|UserPropertiesShape $userProperties
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties
     * @param IdentityContext|IdentityContextShape|null $identityContext
     */
    public static function with(
        string $token,
        UserProperties|array $userProperties,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $email = null,
        ?string $externalID = null,
        IdentityContext|array|null $identityContext = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['userProperties'] = $userProperties;

        null !== $defaultProperties && $self['defaultProperties'] = $defaultProperties;
        null !== $email && $self['email'] = $email;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $identityContext && $self['identityContext'] = $identityContext;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * The token for your Source. You can find this in the dashboard.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     *
     * @param UserProperties|UserPropertiesShape $userProperties
     */
    public function withUserProperties(
        UserProperties|array $userProperties
    ): self {
        $self = clone $this;
        $self['userProperties'] = $userProperties;

        return $self;
    }

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     *
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties
     */
    public function withDefaultProperties(
        DefaultProperties|array|null $defaultProperties
    ): self {
        $self = clone $this;
        $self['defaultProperties'] = $defaultProperties;

        return $self;
    }

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    public function withExternalID(?string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }

    /**
     * End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     *
     * @param IdentityContext|IdentityContextShape|null $identityContext
     */
    public function withIdentityContext(
        IdentityContext|array|null $identityContext
    ): self {
        $self = clone $this;
        $self['identityContext'] = $identityContext;

        return $self;
    }

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
