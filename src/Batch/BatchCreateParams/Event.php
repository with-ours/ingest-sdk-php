<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchCreateParams;

use OursPrivacy\Batch\BatchCreateParams\Event\DefaultProperties;
use OursPrivacy\Batch\BatchCreateParams\Event\IdentityContext;
use OursPrivacy\Batch\BatchCreateParams\Event\UserProperties;
use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\MapOf;

/**
 * @phpstan-import-type DefaultPropertiesShape from \OursPrivacy\Batch\BatchCreateParams\Event\DefaultProperties
 * @phpstan-import-type IdentityContextShape from \OursPrivacy\Batch\BatchCreateParams\Event\IdentityContext
 * @phpstan-import-type UserPropertiesShape from \OursPrivacy\Batch\BatchCreateParams\Event\UserProperties
 *
 * @phpstan-type EventShape = array{
 *   distinctID: string,
 *   event: string,
 *   defaultProperties?: null|DefaultProperties|DefaultPropertiesShape,
 *   email?: string|null,
 *   eventProperties?: array<string,string|null>|null,
 *   externalID?: string|null,
 *   identityContext?: null|IdentityContext|IdentityContextShape,
 *   time?: float|null,
 *   userID?: string|null,
 *   userProperties?: null|UserProperties|UserPropertiesShape,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /**
     * A unique identifier for this event used for deduplication. Highly recommended — if omitted, Ours will generate one for you, but supplying your own gives you stronger idempotency guarantees (e.g. a Stripe payment intent ID or your internal order ID).
     */
    #[Required('distinctId')]
    public string $distinctID;

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
     * The email address of a user. Used as a fallback lookup when neither userId nor externalId is provided. We search your account for a visitor with this email and attach the event to them. If no match is found, a new visitor is created.
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
     * Your system's unique identifier for this user. We search your account for an existing visitor with this externalId and attach the event to them (resolving to their Ours Visitor ID). If no match is found, a new visitor is created. When present, email lookup is skipped. If you also have the userId from cookies or local storage, send both — it removes the lookup round-trip.
     */
    #[Optional('externalId', nullable: true)]
    public ?string $externalID;

    /**
     * End-user network context for server-side calls. Required for probabilistic identity resolution when the caller is a backend server rather than an end-user browser.
     */
    #[Optional(nullable: true)]
    public ?IdentityContext $identityContext;

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    #[Optional(nullable: true)]
    public ?float $time;

    /**
     * The Ours Visitor ID stored in local storage and cookies on your web properties. When present, this is used directly — no lookup by externalId or email is performed. If you have both a userId and an externalId, send both so the event is attached to the right visitor without any lookup overhead.
     */
    #[Optional('userId', nullable: true)]
    public ?string $userID;

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     */
    #[Optional(nullable: true)]
    public ?UserProperties $userProperties;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(distinctID: ..., event: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)->withDistinctID(...)->withEvent(...)
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
     * @param IdentityContext|IdentityContextShape|null $identityContext
     * @param UserProperties|UserPropertiesShape|null $userProperties
     */
    public static function with(
        string $distinctID,
        string $event,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $email = null,
        ?array $eventProperties = null,
        ?string $externalID = null,
        IdentityContext|array|null $identityContext = null,
        ?float $time = null,
        ?string $userID = null,
        UserProperties|array|null $userProperties = null,
    ): self {
        $self = new self;

        $self['distinctID'] = $distinctID;
        $self['event'] = $event;

        null !== $defaultProperties && $self['defaultProperties'] = $defaultProperties;
        null !== $email && $self['email'] = $email;
        null !== $eventProperties && $self['eventProperties'] = $eventProperties;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $identityContext && $self['identityContext'] = $identityContext;
        null !== $time && $self['time'] = $time;
        null !== $userID && $self['userID'] = $userID;
        null !== $userProperties && $self['userProperties'] = $userProperties;

        return $self;
    }

    /**
     * A unique identifier for this event used for deduplication. Highly recommended — if omitted, Ours will generate one for you, but supplying your own gives you stronger idempotency guarantees (e.g. a Stripe payment intent ID or your internal order ID).
     */
    public function withDistinctID(string $distinctID): self
    {
        $self = clone $this;
        $self['distinctID'] = $distinctID;

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
     * The email address of a user. Used as a fallback lookup when neither userId nor externalId is provided. We search your account for a visitor with this email and attach the event to them. If no match is found, a new visitor is created.
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
     * Your system's unique identifier for this user. We search your account for an existing visitor with this externalId and attach the event to them (resolving to their Ours Visitor ID). If no match is found, a new visitor is created. When present, email lookup is skipped. If you also have the userId from cookies or local storage, send both — it removes the lookup round-trip.
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
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    public function withTime(?float $time): self
    {
        $self = clone $this;
        $self['time'] = $time;

        return $self;
    }

    /**
     * The Ours Visitor ID stored in local storage and cookies on your web properties. When present, this is used directly — no lookup by externalId or email is performed. If you have both a userId and an externalId, send both so the event is attached to the right visitor without any lookup overhead.
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
