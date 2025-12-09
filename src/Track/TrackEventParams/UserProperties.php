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
        $obj = new self;

        null !== $adID && $obj['adID'] = $adID;
        null !== $adsetID && $obj['adsetID'] = $adsetID;
        null !== $campaignID && $obj['campaignID'] = $campaignID;
        null !== $city && $obj['city'] = $city;
        null !== $clickid && $obj['clickid'] = $clickid;
        null !== $clid && $obj['clid'] = $clid;
        null !== $companyName && $obj['companyName'] = $companyName;
        null !== $consent && $obj['consent'] = $consent;
        null !== $country && $obj['country'] = $country;
        null !== $customProperties && $obj['customProperties'] = $customProperties;
        null !== $dateOfBirth && $obj['dateOfBirth'] = $dateOfBirth;
        null !== $dclid && $obj['dclid'] = $dclid;
        null !== $email && $obj['email'] = $email;
        null !== $epik && $obj['epik'] = $epik;
        null !== $externalID && $obj['externalID'] = $externalID;
        null !== $fbc && $obj['fbc'] = $fbc;
        null !== $fbclid && $obj['fbclid'] = $fbclid;
        null !== $fbp && $obj['fbp'] = $fbp;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $gadSource && $obj['gadSource'] = $gadSource;
        null !== $gbraid && $obj['gbraid'] = $gbraid;
        null !== $gclid && $obj['gclid'] = $gclid;
        null !== $gender && $obj['gender'] = $gender;
        null !== $ip && $obj['ip'] = $ip;
        null !== $irclickid && $obj['irclickid'] = $irclickid;
        null !== $isBot && $obj['isBot'] = $isBot;
        null !== $jobTitle && $obj['jobTitle'] = $jobTitle;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $liFatID && $obj['liFatID'] = $liFatID;
        null !== $msclkid && $obj['msclkid'] = $msclkid;
        null !== $ndclid && $obj['ndclid'] = $ndclid;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $qclid && $obj['qclid'] = $qclid;
        null !== $rdtCid && $obj['rdtCid'] = $rdtCid;
        null !== $referrer && $obj['referrer'] = $referrer;
        null !== $referringDomain && $obj['referringDomain'] = $referringDomain;
        null !== $sacid && $obj['sacid'] = $sacid;
        null !== $sccid && $obj['sccid'] = $sccid;
        null !== $sid && $obj['sid'] = $sid;
        null !== $state && $obj['state'] = $state;
        null !== $ttclid && $obj['ttclid'] = $ttclid;
        null !== $twclid && $obj['twclid'] = $twclid;
        null !== $userAgent && $obj['userAgent'] = $userAgent;
        null !== $userAgentFullList && $obj['userAgentFullList'] = $userAgentFullList;
        null !== $utmCampaign && $obj['utmCampaign'] = $utmCampaign;
        null !== $utmContent && $obj['utmContent'] = $utmContent;
        null !== $utmMedium && $obj['utmMedium'] = $utmMedium;
        null !== $utmName && $obj['utmName'] = $utmName;
        null !== $utmSource && $obj['utmSource'] = $utmSource;
        null !== $utmTerm && $obj['utmTerm'] = $utmTerm;
        null !== $wbraid && $obj['wbraid'] = $wbraid;
        null !== $zip && $obj['zip'] = $zip;

        return $obj;
    }

    public function withAdID(?string $adID): self
    {
        $obj = clone $this;
        $obj['adID'] = $adID;

        return $obj;
    }

    public function withAdsetID(?string $adsetID): self
    {
        $obj = clone $this;
        $obj['adsetID'] = $adsetID;

        return $obj;
    }

    public function withCampaignID(?string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignID'] = $campaignID;

        return $obj;
    }

    public function withCity(?string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    public function withClickid(?string $clickid): self
    {
        $obj = clone $this;
        $obj['clickid'] = $clickid;

        return $obj;
    }

    public function withClid(?string $clid): self
    {
        $obj = clone $this;
        $obj['clid'] = $clid;

        return $obj;
    }

    public function withCompanyName(?string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

        return $obj;
    }

    /**
     * @param array<string,mixed>|null $consent
     */
    public function withConsent(?array $consent): self
    {
        $obj = clone $this;
        $obj['consent'] = $consent;

        return $obj;
    }

    public function withCountry(?string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * @param array<string,mixed>|null $customProperties
     */
    public function withCustomProperties(?array $customProperties): self
    {
        $obj = clone $this;
        $obj['customProperties'] = $customProperties;

        return $obj;
    }

    public function withDateOfBirth(?string $dateOfBirth): self
    {
        $obj = clone $this;
        $obj['dateOfBirth'] = $dateOfBirth;

        return $obj;
    }

    public function withDclid(?string $dclid): self
    {
        $obj = clone $this;
        $obj['dclid'] = $dclid;

        return $obj;
    }

    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withEpik(?string $epik): self
    {
        $obj = clone $this;
        $obj['epik'] = $epik;

        return $obj;
    }

    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj['externalID'] = $externalID;

        return $obj;
    }

    public function withFbc(?string $fbc): self
    {
        $obj = clone $this;
        $obj['fbc'] = $fbc;

        return $obj;
    }

    public function withFbclid(?string $fbclid): self
    {
        $obj = clone $this;
        $obj['fbclid'] = $fbclid;

        return $obj;
    }

    public function withFbp(?string $fbp): self
    {
        $obj = clone $this;
        $obj['fbp'] = $fbp;

        return $obj;
    }

    public function withFirstName(?string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    public function withGadSource(?string $gadSource): self
    {
        $obj = clone $this;
        $obj['gadSource'] = $gadSource;

        return $obj;
    }

    public function withGbraid(?string $gbraid): self
    {
        $obj = clone $this;
        $obj['gbraid'] = $gbraid;

        return $obj;
    }

    public function withGclid(?string $gclid): self
    {
        $obj = clone $this;
        $obj['gclid'] = $gclid;

        return $obj;
    }

    public function withGender(?string $gender): self
    {
        $obj = clone $this;
        $obj['gender'] = $gender;

        return $obj;
    }

    /**
     * The IP address of the user.
     */
    public function withIP(?string $ip): self
    {
        $obj = clone $this;
        $obj['ip'] = $ip;

        return $obj;
    }

    public function withIrclickid(?string $irclickid): self
    {
        $obj = clone $this;
        $obj['irclickid'] = $irclickid;

        return $obj;
    }

    public function withIsBot(mixed $isBot): self
    {
        $obj = clone $this;
        $obj['isBot'] = $isBot;

        return $obj;
    }

    public function withJobTitle(?string $jobTitle): self
    {
        $obj = clone $this;
        $obj['jobTitle'] = $jobTitle;

        return $obj;
    }

    public function withLastName(?string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    public function withLiFatID(?string $liFatID): self
    {
        $obj = clone $this;
        $obj['liFatID'] = $liFatID;

        return $obj;
    }

    public function withMsclkid(?string $msclkid): self
    {
        $obj = clone $this;
        $obj['msclkid'] = $msclkid;

        return $obj;
    }

    public function withNdclid(?string $ndclid): self
    {
        $obj = clone $this;
        $obj['ndclid'] = $ndclid;

        return $obj;
    }

    public function withPhoneNumber(mixed $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    public function withQclid(?string $qclid): self
    {
        $obj = clone $this;
        $obj['qclid'] = $qclid;

        return $obj;
    }

    public function withRdtCid(?string $rdtCid): self
    {
        $obj = clone $this;
        $obj['rdtCid'] = $rdtCid;

        return $obj;
    }

    public function withReferrer(?string $referrer): self
    {
        $obj = clone $this;
        $obj['referrer'] = $referrer;

        return $obj;
    }

    public function withReferringDomain(?string $referringDomain): self
    {
        $obj = clone $this;
        $obj['referringDomain'] = $referringDomain;

        return $obj;
    }

    public function withSacid(?string $sacid): self
    {
        $obj = clone $this;
        $obj['sacid'] = $sacid;

        return $obj;
    }

    public function withSccid(?string $sccid): self
    {
        $obj = clone $this;
        $obj['sccid'] = $sccid;

        return $obj;
    }

    public function withSid(?string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    public function withState(?string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    public function withTtclid(?string $ttclid): self
    {
        $obj = clone $this;
        $obj['ttclid'] = $ttclid;

        return $obj;
    }

    public function withTwclid(?string $twclid): self
    {
        $obj = clone $this;
        $obj['twclid'] = $twclid;

        return $obj;
    }

    public function withUserAgent(?string $userAgent): self
    {
        $obj = clone $this;
        $obj['userAgent'] = $userAgent;

        return $obj;
    }

    public function withUserAgentFullList(?string $userAgentFullList): self
    {
        $obj = clone $this;
        $obj['userAgentFullList'] = $userAgentFullList;

        return $obj;
    }

    public function withUtmCampaign(?string $utmCampaign): self
    {
        $obj = clone $this;
        $obj['utmCampaign'] = $utmCampaign;

        return $obj;
    }

    public function withUtmContent(?string $utmContent): self
    {
        $obj = clone $this;
        $obj['utmContent'] = $utmContent;

        return $obj;
    }

    public function withUtmMedium(?string $utmMedium): self
    {
        $obj = clone $this;
        $obj['utmMedium'] = $utmMedium;

        return $obj;
    }

    public function withUtmName(?string $utmName): self
    {
        $obj = clone $this;
        $obj['utmName'] = $utmName;

        return $obj;
    }

    public function withUtmSource(?string $utmSource): self
    {
        $obj = clone $this;
        $obj['utmSource'] = $utmSource;

        return $obj;
    }

    public function withUtmTerm(?string $utmTerm): self
    {
        $obj = clone $this;
        $obj['utmTerm'] = $utmTerm;

        return $obj;
    }

    public function withWbraid(?string $wbraid): self
    {
        $obj = clone $this;
        $obj['wbraid'] = $wbraid;

        return $obj;
    }

    public function withZip(mixed $zip): self
    {
        $obj = clone $this;
        $obj['zip'] = $zip;

        return $obj;
    }
}
