<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Concerns\SdkParams;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Visitor\VisitorUpsertParams\DefaultProperties;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;

/**
 * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
 *
 * @see OursPrivacy\Services\VisitorService::upsert()
 *
 * @phpstan-type VisitorUpsertParamsShape = array{
 *   token: string,
 *   userProperties: UserProperties|array{
 *     adID?: string|null,
 *     adsetID?: string|null,
 *     basisCid?: string|null,
 *     campaignID?: string|null,
 *     city?: string|null,
 *     clickid?: string|null,
 *     clid?: string|null,
 *     companyName?: string|null,
 *     consent?: array<string,string|null>|null,
 *     country?: string|null,
 *     customProperties?: array<string,string|null>|null,
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
 *     isBot?: string|null,
 *     jobTitle?: string|null,
 *     lastName?: string|null,
 *     liFatID?: string|null,
 *     msclkid?: string|null,
 *     ndclid?: string|null,
 *     phoneNumber?: string|null,
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
 *     zip?: string|null,
 *   },
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
 *     isBot?: string|null,
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
     * @param UserProperties|array{
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   campaignID?: string|null,
     *   city?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   companyName?: string|null,
     *   consent?: array<string,string|null>|null,
     *   country?: string|null,
     *   customProperties?: array<string,string|null>|null,
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
     *   isBot?: string|null,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: string|null,
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
     *   zip?: string|null,
     * } $userProperties
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
     *   isBot?: string|null,
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
    public static function with(
        string $token,
        UserProperties|array $userProperties,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $email = null,
        ?string $externalID = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['userProperties'] = $userProperties;

        null !== $defaultProperties && $self['defaultProperties'] = $defaultProperties;
        null !== $email && $self['email'] = $email;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $userID && $self['userID'] = $userID;

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
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
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
     *   consent?: array<string,string|null>|null,
     *   country?: string|null,
     *   customProperties?: array<string,string|null>|null,
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
     *   isBot?: string|null,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: string|null,
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
     *   zip?: string|null,
     * } $userProperties
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
     *   isBot?: string|null,
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
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
