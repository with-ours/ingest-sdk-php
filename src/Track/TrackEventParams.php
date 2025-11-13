<?php

declare(strict_types=1);

namespace OursPrivacy\Track;

use OursPrivacy\Core\Attributes\Api;
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
 * @phpstan-type TrackEventParamsShape = array{
 *   token: string,
 *   event: string,
 *   defaultProperties?: DefaultProperties|null,
 *   distinctId?: string|null,
 *   email?: string|null,
 *   eventProperties?: array<string,mixed>|null,
 *   externalId?: string|null,
 *   time?: float|null,
 *   userId?: string|null,
 *   userProperties?: UserProperties|null,
 * }
 */
final class TrackEventParams implements BaseModel
{
    /** @use SdkModel<TrackEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     */
    #[Api]
    public string $token;

    /**
     * The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     */
    #[Api]
    public string $event;

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    #[Api(nullable: true, optional: true)]
    public ?DefaultProperties $defaultProperties;

    /**
     * A unique identifier for the event. This helps prevent duplicate events.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $distinctId;

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $email;

    /**
     * Any additional event properties you want to pass along.
     *
     * @var array<string,mixed>|null $eventProperties
     */
    #[Api(
        type: new MapOf('mixed', nullable: true),
        nullable: true,
        optional: true
    )]
    public ?array $eventProperties;

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $externalId;

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    #[Api(nullable: true, optional: true)]
    public ?float $time;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $userId;

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     */
    #[Api(nullable: true, optional: true)]
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
     * @param array<string,mixed>|null $eventProperties
     */
    public static function with(
        string $token,
        string $event,
        ?DefaultProperties $defaultProperties = null,
        ?string $distinctId = null,
        ?string $email = null,
        ?array $eventProperties = null,
        ?string $externalId = null,
        ?float $time = null,
        ?string $userId = null,
        ?UserProperties $userProperties = null,
    ): self {
        $obj = new self;

        $obj->token = $token;
        $obj->event = $event;

        null !== $defaultProperties && $obj->defaultProperties = $defaultProperties;
        null !== $distinctId && $obj->distinctId = $distinctId;
        null !== $email && $obj->email = $email;
        null !== $eventProperties && $obj->eventProperties = $eventProperties;
        null !== $externalId && $obj->externalId = $externalId;
        null !== $time && $obj->time = $time;
        null !== $userId && $obj->userId = $userId;
        null !== $userProperties && $obj->userProperties = $userProperties;

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
     * The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     */
    public function withEvent(string $event): self
    {
        $obj = clone $this;
        $obj->event = $event;

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
     * A unique identifier for the event. This helps prevent duplicate events.
     */
    public function withDistinctID(?string $distinctID): self
    {
        $obj = clone $this;
        $obj->distinctId = $distinctID;

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
     * Any additional event properties you want to pass along.
     *
     * @param array<string,mixed>|null $eventProperties
     */
    public function withEventProperties(?array $eventProperties): self
    {
        $obj = clone $this;
        $obj->eventProperties = $eventProperties;

        return $obj;
    }

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj->externalId = $externalID;

        return $obj;
    }

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    public function withTime(?float $time): self
    {
        $obj = clone $this;
        $obj->time = $time;

        return $obj;
    }

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     */
    public function withUserProperties(?UserProperties $userProperties): self
    {
        $obj = clone $this;
        $obj->userProperties = $userProperties;

        return $obj;
    }
}
