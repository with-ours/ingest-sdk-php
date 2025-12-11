<?php

declare(strict_types=1);

namespace OursPrivacy\Track\TrackEventParams;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\MapOf;

/**
 * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
 *
 * @phpstan-type UserPropertiesShape = array{
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
 * }
 */
final class UserProperties implements BaseModel
{
    /** @use SdkModel<UserPropertiesShape> */
    use SdkModel;

    #[Optional('ad_id', nullable: true)]
    public ?string $adID;

    #[Optional('adset_id', nullable: true)]
    public ?string $adsetID;

    #[Optional('basis_cid', nullable: true)]
    public ?string $basisCid;

    #[Optional('campaign_id', nullable: true)]
    public ?string $campaignID;

    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $clickid;

    #[Optional(nullable: true)]
    public ?string $clid;

    #[Optional('company_name', nullable: true)]
    public ?string $companyName;

    /** @var array<string,mixed>|null $consent */
    #[Optional(type: new MapOf('mixed', nullable: true), nullable: true)]
    public ?array $consent;

    #[Optional(nullable: true)]
    public ?string $country;

    /** @var array<string,mixed>|null $customProperties */
    #[Optional(
        'custom_properties',
        type: new MapOf('mixed', nullable: true),
        nullable: true,
    )]
    public ?array $customProperties;

    #[Optional('date_of_birth', nullable: true)]
    public ?string $dateOfBirth;

    #[Optional(nullable: true)]
    public ?string $dclid;

    #[Optional(nullable: true)]
    public ?string $email;

    #[Optional(nullable: true)]
    public ?string $epik;

    #[Optional('external_id', nullable: true)]
    public ?string $externalID;

    #[Optional(nullable: true)]
    public ?string $fbc;

    #[Optional(nullable: true)]
    public ?string $fbclid;

    #[Optional(nullable: true)]
    public ?string $fbp;

    #[Optional('first_name', nullable: true)]
    public ?string $firstName;

    #[Optional('gad_source', nullable: true)]
    public ?string $gadSource;

    #[Optional(nullable: true)]
    public ?string $gbraid;

    #[Optional(nullable: true)]
    public ?string $gclid;

    #[Optional(nullable: true)]
    public ?string $gender;

    #[Optional('im_ref', nullable: true)]
    public ?string $imRef;

    /**
     * The IP address of the user.
     */
    #[Optional(nullable: true)]
    public ?string $ip;

    #[Optional(nullable: true)]
    public ?string $irclickid;

    #[Optional('is_bot')]
    public mixed $isBot;

    #[Optional('job_title', nullable: true)]
    public ?string $jobTitle;

    #[Optional('last_name', nullable: true)]
    public ?string $lastName;

    #[Optional('li_fat_id', nullable: true)]
    public ?string $liFatID;

    #[Optional(nullable: true)]
    public ?string $msclkid;

    #[Optional(nullable: true)]
    public ?string $ndclid;

    #[Optional('phone_number')]
    public mixed $phoneNumber;

    #[Optional(nullable: true)]
    public ?string $qclid;

    #[Optional('rdt_cid', nullable: true)]
    public ?string $rdtCid;

    #[Optional(nullable: true)]
    public ?string $referrer;

    #[Optional('referring_domain', nullable: true)]
    public ?string $referringDomain;

    #[Optional(nullable: true)]
    public ?string $sacid;

    #[Optional(nullable: true)]
    public ?string $sccid;

    #[Optional(nullable: true)]
    public ?string $sid;

    #[Optional(nullable: true)]
    public ?string $state;

    #[Optional(nullable: true)]
    public ?string $ttclid;

    #[Optional(nullable: true)]
    public ?string $twclid;

    #[Optional('user_agent', nullable: true)]
    public ?string $userAgent;

    #[Optional('user_agent_full_list', nullable: true)]
    public ?string $userAgentFullList;

    #[Optional('utm_campaign', nullable: true)]
    public ?string $utmCampaign;

    #[Optional('utm_content', nullable: true)]
    public ?string $utmContent;

    #[Optional('utm_medium', nullable: true)]
    public ?string $utmMedium;

    #[Optional('utm_name', nullable: true)]
    public ?string $utmName;

    #[Optional('utm_source', nullable: true)]
    public ?string $utmSource;

    #[Optional('utm_term', nullable: true)]
    public ?string $utmTerm;

    #[Optional(nullable: true)]
    public ?string $wbraid;

    #[Optional]
    public mixed $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $consent
     * @param array<string,mixed>|null $customProperties
     */
    public static function with(
        ?string $adID = null,
        ?string $adsetID = null,
        ?string $basisCid = null,
        ?string $campaignID = null,
        ?string $city = null,
        ?string $clickid = null,
        ?string $clid = null,
        ?string $companyName = null,
        ?array $consent = null,
        ?string $country = null,
        ?array $customProperties = null,
        ?string $dateOfBirth = null,
        ?string $dclid = null,
        ?string $email = null,
        ?string $epik = null,
        ?string $externalID = null,
        ?string $fbc = null,
        ?string $fbclid = null,
        ?string $fbp = null,
        ?string $firstName = null,
        ?string $gadSource = null,
        ?string $gbraid = null,
        ?string $gclid = null,
        ?string $gender = null,
        ?string $imRef = null,
        ?string $ip = null,
        ?string $irclickid = null,
        mixed $isBot = null,
        ?string $jobTitle = null,
        ?string $lastName = null,
        ?string $liFatID = null,
        ?string $msclkid = null,
        ?string $ndclid = null,
        mixed $phoneNumber = null,
        ?string $qclid = null,
        ?string $rdtCid = null,
        ?string $referrer = null,
        ?string $referringDomain = null,
        ?string $sacid = null,
        ?string $sccid = null,
        ?string $sid = null,
        ?string $state = null,
        ?string $ttclid = null,
        ?string $twclid = null,
        ?string $userAgent = null,
        ?string $userAgentFullList = null,
        ?string $utmCampaign = null,
        ?string $utmContent = null,
        ?string $utmMedium = null,
        ?string $utmName = null,
        ?string $utmSource = null,
        ?string $utmTerm = null,
        ?string $wbraid = null,
        mixed $zip = null,
    ): self {
        $self = new self;

        null !== $adID && $self['adID'] = $adID;
        null !== $adsetID && $self['adsetID'] = $adsetID;
        null !== $basisCid && $self['basisCid'] = $basisCid;
        null !== $campaignID && $self['campaignID'] = $campaignID;
        null !== $city && $self['city'] = $city;
        null !== $clickid && $self['clickid'] = $clickid;
        null !== $clid && $self['clid'] = $clid;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $consent && $self['consent'] = $consent;
        null !== $country && $self['country'] = $country;
        null !== $customProperties && $self['customProperties'] = $customProperties;
        null !== $dateOfBirth && $self['dateOfBirth'] = $dateOfBirth;
        null !== $dclid && $self['dclid'] = $dclid;
        null !== $email && $self['email'] = $email;
        null !== $epik && $self['epik'] = $epik;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $fbc && $self['fbc'] = $fbc;
        null !== $fbclid && $self['fbclid'] = $fbclid;
        null !== $fbp && $self['fbp'] = $fbp;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $gadSource && $self['gadSource'] = $gadSource;
        null !== $gbraid && $self['gbraid'] = $gbraid;
        null !== $gclid && $self['gclid'] = $gclid;
        null !== $gender && $self['gender'] = $gender;
        null !== $imRef && $self['imRef'] = $imRef;
        null !== $ip && $self['ip'] = $ip;
        null !== $irclickid && $self['irclickid'] = $irclickid;
        null !== $isBot && $self['isBot'] = $isBot;
        null !== $jobTitle && $self['jobTitle'] = $jobTitle;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $liFatID && $self['liFatID'] = $liFatID;
        null !== $msclkid && $self['msclkid'] = $msclkid;
        null !== $ndclid && $self['ndclid'] = $ndclid;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $qclid && $self['qclid'] = $qclid;
        null !== $rdtCid && $self['rdtCid'] = $rdtCid;
        null !== $referrer && $self['referrer'] = $referrer;
        null !== $referringDomain && $self['referringDomain'] = $referringDomain;
        null !== $sacid && $self['sacid'] = $sacid;
        null !== $sccid && $self['sccid'] = $sccid;
        null !== $sid && $self['sid'] = $sid;
        null !== $state && $self['state'] = $state;
        null !== $ttclid && $self['ttclid'] = $ttclid;
        null !== $twclid && $self['twclid'] = $twclid;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $userAgentFullList && $self['userAgentFullList'] = $userAgentFullList;
        null !== $utmCampaign && $self['utmCampaign'] = $utmCampaign;
        null !== $utmContent && $self['utmContent'] = $utmContent;
        null !== $utmMedium && $self['utmMedium'] = $utmMedium;
        null !== $utmName && $self['utmName'] = $utmName;
        null !== $utmSource && $self['utmSource'] = $utmSource;
        null !== $utmTerm && $self['utmTerm'] = $utmTerm;
        null !== $wbraid && $self['wbraid'] = $wbraid;
        null !== $zip && $self['zip'] = $zip;

        return $self;
    }

    public function withAdID(?string $adID): self
    {
        $self = clone $this;
        $self['adID'] = $adID;

        return $self;
    }

    public function withAdsetID(?string $adsetID): self
    {
        $self = clone $this;
        $self['adsetID'] = $adsetID;

        return $self;
    }

    public function withBasisCid(?string $basisCid): self
    {
        $self = clone $this;
        $self['basisCid'] = $basisCid;

        return $self;
    }

    public function withCampaignID(?string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withClickid(?string $clickid): self
    {
        $self = clone $this;
        $self['clickid'] = $clickid;

        return $self;
    }

    public function withClid(?string $clid): self
    {
        $self = clone $this;
        $self['clid'] = $clid;

        return $self;
    }

    public function withCompanyName(?string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $consent
     */
    public function withConsent(?array $consent): self
    {
        $self = clone $this;
        $self['consent'] = $consent;

        return $self;
    }

    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * @param array<string,mixed>|null $customProperties
     */
    public function withCustomProperties(?array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    public function withDateOfBirth(?string $dateOfBirth): self
    {
        $self = clone $this;
        $self['dateOfBirth'] = $dateOfBirth;

        return $self;
    }

    public function withDclid(?string $dclid): self
    {
        $self = clone $this;
        $self['dclid'] = $dclid;

        return $self;
    }

    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withEpik(?string $epik): self
    {
        $self = clone $this;
        $self['epik'] = $epik;

        return $self;
    }

    public function withExternalID(?string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }

    public function withFbc(?string $fbc): self
    {
        $self = clone $this;
        $self['fbc'] = $fbc;

        return $self;
    }

    public function withFbclid(?string $fbclid): self
    {
        $self = clone $this;
        $self['fbclid'] = $fbclid;

        return $self;
    }

    public function withFbp(?string $fbp): self
    {
        $self = clone $this;
        $self['fbp'] = $fbp;

        return $self;
    }

    public function withFirstName(?string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withGadSource(?string $gadSource): self
    {
        $self = clone $this;
        $self['gadSource'] = $gadSource;

        return $self;
    }

    public function withGbraid(?string $gbraid): self
    {
        $self = clone $this;
        $self['gbraid'] = $gbraid;

        return $self;
    }

    public function withGclid(?string $gclid): self
    {
        $self = clone $this;
        $self['gclid'] = $gclid;

        return $self;
    }

    public function withGender(?string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    public function withImRef(?string $imRef): self
    {
        $self = clone $this;
        $self['imRef'] = $imRef;

        return $self;
    }

    /**
     * The IP address of the user.
     */
    public function withIP(?string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    public function withIrclickid(?string $irclickid): self
    {
        $self = clone $this;
        $self['irclickid'] = $irclickid;

        return $self;
    }

    public function withIsBot(mixed $isBot): self
    {
        $self = clone $this;
        $self['isBot'] = $isBot;

        return $self;
    }

    public function withJobTitle(?string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

        return $self;
    }

    public function withLastName(?string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withLiFatID(?string $liFatID): self
    {
        $self = clone $this;
        $self['liFatID'] = $liFatID;

        return $self;
    }

    public function withMsclkid(?string $msclkid): self
    {
        $self = clone $this;
        $self['msclkid'] = $msclkid;

        return $self;
    }

    public function withNdclid(?string $ndclid): self
    {
        $self = clone $this;
        $self['ndclid'] = $ndclid;

        return $self;
    }

    public function withPhoneNumber(mixed $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withQclid(?string $qclid): self
    {
        $self = clone $this;
        $self['qclid'] = $qclid;

        return $self;
    }

    public function withRdtCid(?string $rdtCid): self
    {
        $self = clone $this;
        $self['rdtCid'] = $rdtCid;

        return $self;
    }

    public function withReferrer(?string $referrer): self
    {
        $self = clone $this;
        $self['referrer'] = $referrer;

        return $self;
    }

    public function withReferringDomain(?string $referringDomain): self
    {
        $self = clone $this;
        $self['referringDomain'] = $referringDomain;

        return $self;
    }

    public function withSacid(?string $sacid): self
    {
        $self = clone $this;
        $self['sacid'] = $sacid;

        return $self;
    }

    public function withSccid(?string $sccid): self
    {
        $self = clone $this;
        $self['sccid'] = $sccid;

        return $self;
    }

    public function withSid(?string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withTtclid(?string $ttclid): self
    {
        $self = clone $this;
        $self['ttclid'] = $ttclid;

        return $self;
    }

    public function withTwclid(?string $twclid): self
    {
        $self = clone $this;
        $self['twclid'] = $twclid;

        return $self;
    }

    public function withUserAgent(?string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    public function withUserAgentFullList(?string $userAgentFullList): self
    {
        $self = clone $this;
        $self['userAgentFullList'] = $userAgentFullList;

        return $self;
    }

    public function withUtmCampaign(?string $utmCampaign): self
    {
        $self = clone $this;
        $self['utmCampaign'] = $utmCampaign;

        return $self;
    }

    public function withUtmContent(?string $utmContent): self
    {
        $self = clone $this;
        $self['utmContent'] = $utmContent;

        return $self;
    }

    public function withUtmMedium(?string $utmMedium): self
    {
        $self = clone $this;
        $self['utmMedium'] = $utmMedium;

        return $self;
    }

    public function withUtmName(?string $utmName): self
    {
        $self = clone $this;
        $self['utmName'] = $utmName;

        return $self;
    }

    public function withUtmSource(?string $utmSource): self
    {
        $self = clone $this;
        $self['utmSource'] = $utmSource;

        return $self;
    }

    public function withUtmTerm(?string $utmTerm): self
    {
        $self = clone $this;
        $self['utmTerm'] = $utmTerm;

        return $self;
    }

    public function withWbraid(?string $wbraid): self
    {
        $self = clone $this;
        $self['wbraid'] = $wbraid;

        return $self;
    }

    public function withZip(mixed $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
