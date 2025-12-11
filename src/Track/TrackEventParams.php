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
 * @phpstan-type TrackEventParamsShape = array{
 *   token: string,
 *   event: string,
 *   defaultProperties?: null|DefaultProperties|array{
 *     activeDuration?: float|null,
 *     adID?: string|null,
 *     adsetID?: string|null,
 *     basisCid?: string|null,
 *     browserLanguage?: string|null,
 *     browserName?: string|null,
 *     browserVersion?: string|null,
 *     campaignID?: string|null,
 *     clickid?: string|null,
 *     clid?: string|null,
 *     cpuArchitecture?: string|null,
 *     currentURL?: string|null,
 *     dclid?: string|null,
 *     deviceModel?: string|null,
 *     deviceType?: string|null,
 *     deviceVendor?: string|null,
 *     duration?: float|null,
 *     encoding?: string|null,
 *     engineName?: string|null,
 *     engineVersion?: string|null,
 *     epik?: string|null,
 *     fbc?: string|null,
 *     fbclid?: string|null,
 *     fbp?: string|null,
 *     fv?: bool|null,
 *     gadSource?: string|null,
 *     gbraid?: string|null,
 *     gclid?: string|null,
 *     host?: string|null,
 *     iframe?: bool|null,
 *     imRef?: string|null,
 *     ip?: string|null,
 *     irclickid?: string|null,
 *     isBot?: mixed,
 *     liFatID?: string|null,
 *     msclkid?: string|null,
 *     ndclid?: string|null,
 *     newS?: bool|null,
 *     osName?: string|null,
 *     osVersion?: string|null,
 *     pageHash?: float|null,
 *     pathname?: string|null,
 *     qclid?: string|null,
 *     rdtCid?: string|null,
 *     receivedAt?: string|null,
 *     referrer?: string|null,
 *     referringDomain?: string|null,
 *     sacid?: string|null,
 *     sccid?: string|null,
 *     screenHeight?: float|null,
 *     screenWidth?: float|null,
 *     sessionCount?: float|null,
 *     sid?: string|null,
 *     sr?: string|null,
 *     title?: string|null,
 *     ttclid?: string|null,
 *     twclid?: string|null,
 *     uafvl?: string|null,
 *     userAgent?: string|null,
 *     utmCampaign?: string|null,
 *     utmContent?: string|null,
 *     utmMedium?: string|null,
 *     utmName?: string|null,
 *     utmSource?: string|null,
 *     utmTerm?: string|null,
 *     version?: string|null,
 *     wbraid?: string|null,
 *     webview?: bool|null,
 *   },
 *   distinctID?: string|null,
 *   email?: string|null,
 *   eventProperties?: array<string,mixed>|null,
 *   externalID?: string|null,
 *   time?: float|null,
 *   userID?: string|null,
 *   userProperties?: null|UserProperties|array{
 *     adID?: string|null,
 *     adsetID?: string|null,
 *     basisCid?: string|null,
 *     campaignID?: string|null,
 *     city?: string|null,
 *     clickid?: string|null,
 *     clid?: string|null,
 *     companyName?: string|null,
 *     consent?: array<string,mixed>|null,
 *     country?: string|null,
 *     customProperties?: array<string,mixed>|null,
 *     dateOfBirth?: string|null,
 *     dclid?: string|null,
 *     email?: string|null,
 *     epik?: string|null,
 *     externalID?: string|null,
 *     fbc?: string|null,
 *     fbclid?: string|null,
 *     fbp?: string|null,
 *     firstName?: string|null,
 *     gadSource?: string|null,
 *     gbraid?: string|null,
 *     gclid?: string|null,
 *     gender?: string|null,
 *     imRef?: string|null,
 *     ip?: string|null,
 *     irclickid?: string|null,
 *     isBot?: mixed,
 *     jobTitle?: string|null,
 *     lastName?: string|null,
 *     liFatID?: string|null,
 *     msclkid?: string|null,
 *     ndclid?: string|null,
 *     phoneNumber?: mixed,
 *     qclid?: string|null,
 *     rdtCid?: string|null,
 *     referrer?: string|null,
 *     referringDomain?: string|null,
 *     sacid?: string|null,
 *     sccid?: string|null,
 *     sid?: string|null,
 *     state?: string|null,
 *     ttclid?: string|null,
 *     twclid?: string|null,
 *     userAgent?: string|null,
 *     userAgentFullList?: string|null,
 *     utmCampaign?: string|null,
 *     utmContent?: string|null,
 *     utmMedium?: string|null,
 *     utmName?: string|null,
 *     utmSource?: string|null,
 *     utmTerm?: string|null,
 *     wbraid?: string|null,
 *     zip?: mixed,
 *   },
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
     * @var array<string,mixed>|null $eventProperties
     */
    #[Optional(type: new MapOf('mixed', nullable: true), nullable: true)]
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
     * @param DefaultProperties|array{
     *   activeDuration?: float|null,
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   browserLanguage?: string|null,
     *   browserName?: string|null,
     *   browserVersion?: string|null,
     *   campaignID?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   cpuArchitecture?: string|null,
     *   currentURL?: string|null,
     *   dclid?: string|null,
     *   deviceModel?: string|null,
     *   deviceType?: string|null,
     *   deviceVendor?: string|null,
     *   duration?: float|null,
     *   encoding?: string|null,
     *   engineName?: string|null,
     *   engineVersion?: string|null,
     *   epik?: string|null,
     *   fbc?: string|null,
     *   fbclid?: string|null,
     *   fbp?: string|null,
     *   fv?: bool|null,
     *   gadSource?: string|null,
     *   gbraid?: string|null,
     *   gclid?: string|null,
     *   host?: string|null,
     *   iframe?: bool|null,
     *   imRef?: string|null,
     *   ip?: string|null,
     *   irclickid?: string|null,
     *   isBot?: mixed,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   newS?: bool|null,
     *   osName?: string|null,
     *   osVersion?: string|null,
     *   pageHash?: float|null,
     *   pathname?: string|null,
     *   qclid?: string|null,
     *   rdtCid?: string|null,
     *   receivedAt?: string|null,
     *   referrer?: string|null,
     *   referringDomain?: string|null,
     *   sacid?: string|null,
     *   sccid?: string|null,
     *   screenHeight?: float|null,
     *   screenWidth?: float|null,
     *   sessionCount?: float|null,
     *   sid?: string|null,
     *   sr?: string|null,
     *   title?: string|null,
     *   ttclid?: string|null,
     *   twclid?: string|null,
     *   uafvl?: string|null,
     *   userAgent?: string|null,
     *   utmCampaign?: string|null,
     *   utmContent?: string|null,
     *   utmMedium?: string|null,
     *   utmName?: string|null,
     *   utmSource?: string|null,
     *   utmTerm?: string|null,
     *   version?: string|null,
     *   wbraid?: string|null,
     *   webview?: bool|null,
     * }|null $defaultProperties
     * @param array<string,mixed>|null $eventProperties
     * @param UserProperties|array{
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   campaignID?: string|null,
     *   city?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   companyName?: string|null,
     *   consent?: array<string,mixed>|null,
     *   country?: string|null,
     *   customProperties?: array<string,mixed>|null,
     *   dateOfBirth?: string|null,
     *   dclid?: string|null,
     *   email?: string|null,
     *   epik?: string|null,
     *   externalID?: string|null,
     *   fbc?: string|null,
     *   fbclid?: string|null,
     *   fbp?: string|null,
     *   firstName?: string|null,
     *   gadSource?: string|null,
     *   gbraid?: string|null,
     *   gclid?: string|null,
     *   gender?: string|null,
     *   imRef?: string|null,
     *   ip?: string|null,
     *   irclickid?: string|null,
     *   isBot?: mixed,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: mixed,
     *   qclid?: string|null,
     *   rdtCid?: string|null,
     *   referrer?: string|null,
     *   referringDomain?: string|null,
     *   sacid?: string|null,
     *   sccid?: string|null,
     *   sid?: string|null,
     *   state?: string|null,
     *   ttclid?: string|null,
     *   twclid?: string|null,
     *   userAgent?: string|null,
     *   userAgentFullList?: string|null,
     *   utmCampaign?: string|null,
     *   utmContent?: string|null,
     *   utmMedium?: string|null,
     *   utmName?: string|null,
     *   utmSource?: string|null,
     *   utmTerm?: string|null,
     *   wbraid?: string|null,
     *   zip?: mixed,
     * }|null $userProperties
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
     * The token for your Ours Privacy Source. You can find this in the Ours dashboard.
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
     * @param DefaultProperties|array{
     *   activeDuration?: float|null,
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   browserLanguage?: string|null,
     *   browserName?: string|null,
     *   browserVersion?: string|null,
     *   campaignID?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   cpuArchitecture?: string|null,
     *   currentURL?: string|null,
     *   dclid?: string|null,
     *   deviceModel?: string|null,
     *   deviceType?: string|null,
     *   deviceVendor?: string|null,
     *   duration?: float|null,
     *   encoding?: string|null,
     *   engineName?: string|null,
     *   engineVersion?: string|null,
     *   epik?: string|null,
     *   fbc?: string|null,
     *   fbclid?: string|null,
     *   fbp?: string|null,
     *   fv?: bool|null,
     *   gadSource?: string|null,
     *   gbraid?: string|null,
     *   gclid?: string|null,
     *   host?: string|null,
     *   iframe?: bool|null,
     *   imRef?: string|null,
     *   ip?: string|null,
     *   irclickid?: string|null,
     *   isBot?: mixed,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   newS?: bool|null,
     *   osName?: string|null,
     *   osVersion?: string|null,
     *   pageHash?: float|null,
     *   pathname?: string|null,
     *   qclid?: string|null,
     *   rdtCid?: string|null,
     *   receivedAt?: string|null,
     *   referrer?: string|null,
     *   referringDomain?: string|null,
     *   sacid?: string|null,
     *   sccid?: string|null,
     *   screenHeight?: float|null,
     *   screenWidth?: float|null,
     *   sessionCount?: float|null,
     *   sid?: string|null,
     *   sr?: string|null,
     *   title?: string|null,
     *   ttclid?: string|null,
     *   twclid?: string|null,
     *   uafvl?: string|null,
     *   userAgent?: string|null,
     *   utmCampaign?: string|null,
     *   utmContent?: string|null,
     *   utmMedium?: string|null,
     *   utmName?: string|null,
     *   utmSource?: string|null,
     *   utmTerm?: string|null,
     *   version?: string|null,
     *   wbraid?: string|null,
     *   webview?: bool|null,
     * }|null $defaultProperties
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
     * @param array<string,mixed>|null $eventProperties
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
     * @param UserProperties|array{
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   campaignID?: string|null,
     *   city?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   companyName?: string|null,
     *   consent?: array<string,mixed>|null,
     *   country?: string|null,
     *   customProperties?: array<string,mixed>|null,
     *   dateOfBirth?: string|null,
     *   dclid?: string|null,
     *   email?: string|null,
     *   epik?: string|null,
     *   externalID?: string|null,
     *   fbc?: string|null,
     *   fbclid?: string|null,
     *   fbp?: string|null,
     *   firstName?: string|null,
     *   gadSource?: string|null,
     *   gbraid?: string|null,
     *   gclid?: string|null,
     *   gender?: string|null,
     *   imRef?: string|null,
     *   ip?: string|null,
     *   irclickid?: string|null,
     *   isBot?: mixed,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: mixed,
     *   qclid?: string|null,
     *   rdtCid?: string|null,
     *   referrer?: string|null,
     *   referringDomain?: string|null,
     *   sacid?: string|null,
     *   sccid?: string|null,
     *   sid?: string|null,
     *   state?: string|null,
     *   ttclid?: string|null,
     *   twclid?: string|null,
     *   userAgent?: string|null,
     *   userAgentFullList?: string|null,
     *   utmCampaign?: string|null,
     *   utmContent?: string|null,
     *   utmMedium?: string|null,
     *   utmName?: string|null,
     *   utmSource?: string|null,
     *   utmTerm?: string|null,
     *   wbraid?: string|null,
     *   zip?: mixed,
     * }|null $userProperties
     */
    public function withUserProperties(
        UserProperties|array|null $userProperties
    ): self {
        $self = clone $this;
        $self['userProperties'] = $userProperties;

        return $self;
    }
}
