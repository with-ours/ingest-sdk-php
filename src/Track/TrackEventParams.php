<?php

declare(strict_types=1);

namespace OursPrivacy\Track;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\MapOf;
use OursPrivacy\Track\TrackEventParams\DefaultProperties;
use OursPrivacy\Track\TrackEventParams\UserProperties;

/**
 * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
 *
 * @see OursPrivacy\Services\TrackService::event()
 *
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Track\TrackEventParams\DefaultProperties
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Track\TrackEventParams\UserProperties
 *
 * @phpstan-type TrackEventParamsShape = array{
 *   token: string,
 *   event: string,
 *   defaultProperties?: null|DefaultProperties|DefaultPropertiesShape,
 *   distinctID?: string|null,
 *   email?: string|null,
 *   eventProperties?: array<string,string|null>|null,
 *   externalID?: string|null,
 *   time?: float|null,
 *   userID?: string|null,
 *   userProperties?: null|UserProperties|UserPropertiesShape,
 * }
 */
final class TrackEventParams implements BaseModel
{
    /** @use SdkModel<TrackEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The token for your Source. You can find this in the dashboard.
     */
    #[Required]
    public string $token;

    /**
     * The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     */
    #[Required]
    public string $event;

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    #[Optional(nullable: true)]
    public ?DefaultProperties $defaultProperties;

    /**
     * A unique identifier for the event. This helps prevent duplicate events.
     */
    #[Optional('distinctId', nullable: true)]
    public ?string $distinctID;

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * Any additional event properties you want to pass along.
     *
     * @var array<string,string|null>|null $eventProperties
     */
    #[Optional(type: new MapOf('string', nullable: true), nullable: true)]
    public ?array $eventProperties;

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    #[Optional('externalId', nullable: true)]
    public ?string $externalID;

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    #[Optional(nullable: true)]
    public ?float $time;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Optional('userId', nullable: true)]
    public ?string $userID;

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     */
    #[Optional(nullable: true)]
    public ?UserProperties $userProperties;

    /**
     * `new TrackEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackEventParams::with(token: ..., event: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackEventParams)->withToken(...)->withEvent(...)
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
     * @param DefaultProperties|DefaultPropertiesShape|null $defaultProperties
     * @param array<string,string|null>|null $eventProperties
     * @param UserProperties|UserPropertiesShape|null $userProperties
     */
    public static function with(
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
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['event'] = $event;

        null !== $defaultProperties && $self['defaultProperties'] = $defaultProperties;
        null !== $distinctID && $self['distinctID'] = $distinctID;
        null !== $email && $self['email'] = $email;
        null !== $eventProperties && $self['eventProperties'] = $eventProperties;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $time && $self['time'] = $time;
        null !== $userID && $self['userID'] = $userID;
        null !== $userProperties && $self['userProperties'] = $userProperties;

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
     * The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     */
    public function withEvent(string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

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
     * A unique identifier for the event. This helps prevent duplicate events.
     */
    public function withDistinctID(?string $distinctID): self
    {
        $self = clone $this;
        $self['distinctID'] = $distinctID;

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
     * Any additional event properties you want to pass along.
     *
     * @param array<string,string|null>|null $eventProperties
     */
    public function withEventProperties(?array $eventProperties): self
    {
        $self = clone $this;
        $self['eventProperties'] = $eventProperties;

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
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    public function withTime(?float $time): self
    {
        $self = clone $this;
        $self['time'] = $time;

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

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     *
     * @param UserProperties|UserPropertiesShape|null $userProperties
     */
    public function withUserProperties(
        UserProperties|array|null $userProperties
    ): self {
        $self = clone $this;
        $self['userProperties'] = $userProperties;

        return $self;
    }
}
