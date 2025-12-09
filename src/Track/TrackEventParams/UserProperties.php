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
 *   ad_id?: string|null,
 *   adset_id?: string|null,
 *   campaign_id?: string|null,
 *   city?: string|null,
 *   clickid?: string|null,
 *   clid?: string|null,
 *   company_name?: string|null,
 *   consent?: array<string,mixed>|null,
 *   country?: string|null,
 *   custom_properties?: array<string,mixed>|null,
 *   date_of_birth?: string|null,
 *   dclid?: string|null,
 *   email?: string|null,
 *   epik?: string|null,
 *   external_id?: string|null,
 *   fbc?: string|null,
 *   fbclid?: string|null,
 *   fbp?: string|null,
 *   first_name?: string|null,
 *   gad_source?: string|null,
 *   gbraid?: string|null,
 *   gclid?: string|null,
 *   gender?: string|null,
 *   ip?: string|null,
 *   irclickid?: string|null,
 *   is_bot?: mixed,
 *   job_title?: string|null,
 *   last_name?: string|null,
 *   li_fat_id?: string|null,
 *   msclkid?: string|null,
 *   ndclid?: string|null,
 *   phone_number?: mixed,
 *   qclid?: string|null,
 *   rdt_cid?: string|null,
 *   referrer?: string|null,
 *   referring_domain?: string|null,
 *   sacid?: string|null,
 *   sccid?: string|null,
 *   sid?: string|null,
 *   state?: string|null,
 *   ttclid?: string|null,
 *   twclid?: string|null,
 *   user_agent?: string|null,
 *   user_agent_full_list?: string|null,
 *   utm_campaign?: string|null,
 *   utm_content?: string|null,
 *   utm_medium?: string|null,
 *   utm_name?: string|null,
 *   utm_source?: string|null,
 *   utm_term?: string|null,
 *   wbraid?: string|null,
 *   zip?: mixed,
 * }
 */
final class UserProperties implements BaseModel
{
    /** @use SdkModel<UserPropertiesShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $ad_id;

    #[Optional(nullable: true)]
    public ?string $adset_id;

    #[Optional(nullable: true)]
    public ?string $campaign_id;

    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $clickid;

    #[Optional(nullable: true)]
    public ?string $clid;

    #[Optional(nullable: true)]
    public ?string $company_name;

    /** @var array<string,mixed>|null $consent */
    #[Optional(type: new MapOf('mixed', nullable: true), nullable: true)]
    public ?array $consent;

    #[Optional(nullable: true)]
    public ?string $country;

    /** @var array<string,mixed>|null $custom_properties */
    #[Optional(type: new MapOf('mixed', nullable: true), nullable: true)]
    public ?array $custom_properties;

    #[Optional(nullable: true)]
    public ?string $date_of_birth;

    #[Optional(nullable: true)]
    public ?string $dclid;

    #[Optional(nullable: true)]
    public ?string $email;

    #[Optional(nullable: true)]
    public ?string $epik;

    #[Optional(nullable: true)]
    public ?string $external_id;

    #[Optional(nullable: true)]
    public ?string $fbc;

    #[Optional(nullable: true)]
    public ?string $fbclid;

    #[Optional(nullable: true)]
    public ?string $fbp;

    #[Optional(nullable: true)]
    public ?string $first_name;

    #[Optional(nullable: true)]
    public ?string $gad_source;

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

    #[Optional]
    public mixed $is_bot;

    #[Optional(nullable: true)]
    public ?string $job_title;

    #[Optional(nullable: true)]
    public ?string $last_name;

    #[Optional(nullable: true)]
    public ?string $li_fat_id;

    #[Optional(nullable: true)]
    public ?string $msclkid;

    #[Optional(nullable: true)]
    public ?string $ndclid;

    #[Optional]
    public mixed $phone_number;

    #[Optional(nullable: true)]
    public ?string $qclid;

    #[Optional(nullable: true)]
    public ?string $rdt_cid;

    #[Optional(nullable: true)]
    public ?string $referrer;

    #[Optional(nullable: true)]
    public ?string $referring_domain;

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

    #[Optional(nullable: true)]
    public ?string $user_agent;

    #[Optional(nullable: true)]
    public ?string $user_agent_full_list;

    #[Optional(nullable: true)]
    public ?string $utm_campaign;

    #[Optional(nullable: true)]
    public ?string $utm_content;

    #[Optional(nullable: true)]
    public ?string $utm_medium;

    #[Optional(nullable: true)]
    public ?string $utm_name;

    #[Optional(nullable: true)]
    public ?string $utm_source;

    #[Optional(nullable: true)]
    public ?string $utm_term;

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
     * @param array<string,mixed>|null $custom_properties
     */
    public static function with(
        ?string $ad_id = null,
        ?string $adset_id = null,
        ?string $campaign_id = null,
        ?string $city = null,
        ?string $clickid = null,
        ?string $clid = null,
        ?string $company_name = null,
        ?array $consent = null,
        ?string $country = null,
        ?array $custom_properties = null,
        ?string $date_of_birth = null,
        ?string $dclid = null,
        ?string $email = null,
        ?string $epik = null,
        ?string $external_id = null,
        ?string $fbc = null,
        ?string $fbclid = null,
        ?string $fbp = null,
        ?string $first_name = null,
        ?string $gad_source = null,
        ?string $gbraid = null,
        ?string $gclid = null,
        ?string $gender = null,
        ?string $ip = null,
        ?string $irclickid = null,
        mixed $is_bot = null,
        ?string $job_title = null,
        ?string $last_name = null,
        ?string $li_fat_id = null,
        ?string $msclkid = null,
        ?string $ndclid = null,
        mixed $phone_number = null,
        ?string $qclid = null,
        ?string $rdt_cid = null,
        ?string $referrer = null,
        ?string $referring_domain = null,
        ?string $sacid = null,
        ?string $sccid = null,
        ?string $sid = null,
        ?string $state = null,
        ?string $ttclid = null,
        ?string $twclid = null,
        ?string $user_agent = null,
        ?string $user_agent_full_list = null,
        ?string $utm_campaign = null,
        ?string $utm_content = null,
        ?string $utm_medium = null,
        ?string $utm_name = null,
        ?string $utm_source = null,
        ?string $utm_term = null,
        ?string $wbraid = null,
        mixed $zip = null,
    ): self {
        $obj = new self;

        null !== $ad_id && $obj['ad_id'] = $ad_id;
        null !== $adset_id && $obj['adset_id'] = $adset_id;
        null !== $campaign_id && $obj['campaign_id'] = $campaign_id;
        null !== $city && $obj['city'] = $city;
        null !== $clickid && $obj['clickid'] = $clickid;
        null !== $clid && $obj['clid'] = $clid;
        null !== $company_name && $obj['company_name'] = $company_name;
        null !== $consent && $obj['consent'] = $consent;
        null !== $country && $obj['country'] = $country;
        null !== $custom_properties && $obj['custom_properties'] = $custom_properties;
        null !== $date_of_birth && $obj['date_of_birth'] = $date_of_birth;
        null !== $dclid && $obj['dclid'] = $dclid;
        null !== $email && $obj['email'] = $email;
        null !== $epik && $obj['epik'] = $epik;
        null !== $external_id && $obj['external_id'] = $external_id;
        null !== $fbc && $obj['fbc'] = $fbc;
        null !== $fbclid && $obj['fbclid'] = $fbclid;
        null !== $fbp && $obj['fbp'] = $fbp;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $gad_source && $obj['gad_source'] = $gad_source;
        null !== $gbraid && $obj['gbraid'] = $gbraid;
        null !== $gclid && $obj['gclid'] = $gclid;
        null !== $gender && $obj['gender'] = $gender;
        null !== $ip && $obj['ip'] = $ip;
        null !== $irclickid && $obj['irclickid'] = $irclickid;
        null !== $is_bot && $obj['is_bot'] = $is_bot;
        null !== $job_title && $obj['job_title'] = $job_title;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $li_fat_id && $obj['li_fat_id'] = $li_fat_id;
        null !== $msclkid && $obj['msclkid'] = $msclkid;
        null !== $ndclid && $obj['ndclid'] = $ndclid;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $qclid && $obj['qclid'] = $qclid;
        null !== $rdt_cid && $obj['rdt_cid'] = $rdt_cid;
        null !== $referrer && $obj['referrer'] = $referrer;
        null !== $referring_domain && $obj['referring_domain'] = $referring_domain;
        null !== $sacid && $obj['sacid'] = $sacid;
        null !== $sccid && $obj['sccid'] = $sccid;
        null !== $sid && $obj['sid'] = $sid;
        null !== $state && $obj['state'] = $state;
        null !== $ttclid && $obj['ttclid'] = $ttclid;
        null !== $twclid && $obj['twclid'] = $twclid;
        null !== $user_agent && $obj['user_agent'] = $user_agent;
        null !== $user_agent_full_list && $obj['user_agent_full_list'] = $user_agent_full_list;
        null !== $utm_campaign && $obj['utm_campaign'] = $utm_campaign;
        null !== $utm_content && $obj['utm_content'] = $utm_content;
        null !== $utm_medium && $obj['utm_medium'] = $utm_medium;
        null !== $utm_name && $obj['utm_name'] = $utm_name;
        null !== $utm_source && $obj['utm_source'] = $utm_source;
        null !== $utm_term && $obj['utm_term'] = $utm_term;
        null !== $wbraid && $obj['wbraid'] = $wbraid;
        null !== $zip && $obj['zip'] = $zip;

        return $obj;
    }

    public function withAdID(?string $adID): self
    {
        $obj = clone $this;
        $obj['ad_id'] = $adID;

        return $obj;
    }

    public function withAdsetID(?string $adsetID): self
    {
        $obj = clone $this;
        $obj['adset_id'] = $adsetID;

        return $obj;
    }

    public function withCampaignID(?string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaign_id'] = $campaignID;

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
        $obj['company_name'] = $companyName;

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
        $obj['custom_properties'] = $customProperties;

        return $obj;
    }

    public function withDateOfBirth(?string $dateOfBirth): self
    {
        $obj = clone $this;
        $obj['date_of_birth'] = $dateOfBirth;

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
        $obj['external_id'] = $externalID;

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
        $obj['first_name'] = $firstName;

        return $obj;
    }

    public function withGadSource(?string $gadSource): self
    {
        $obj = clone $this;
        $obj['gad_source'] = $gadSource;

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
        $obj['is_bot'] = $isBot;

        return $obj;
    }

    public function withJobTitle(?string $jobTitle): self
    {
        $obj = clone $this;
        $obj['job_title'] = $jobTitle;

        return $obj;
    }

    public function withLastName(?string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    public function withLiFatID(?string $liFatID): self
    {
        $obj = clone $this;
        $obj['li_fat_id'] = $liFatID;

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
        $obj['phone_number'] = $phoneNumber;

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
        $obj['rdt_cid'] = $rdtCid;

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
        $obj['referring_domain'] = $referringDomain;

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
        $obj['user_agent'] = $userAgent;

        return $obj;
    }

    public function withUserAgentFullList(?string $userAgentFullList): self
    {
        $obj = clone $this;
        $obj['user_agent_full_list'] = $userAgentFullList;

        return $obj;
    }

    public function withUtmCampaign(?string $utmCampaign): self
    {
        $obj = clone $this;
        $obj['utm_campaign'] = $utmCampaign;

        return $obj;
    }

    public function withUtmContent(?string $utmContent): self
    {
        $obj = clone $this;
        $obj['utm_content'] = $utmContent;

        return $obj;
    }

    public function withUtmMedium(?string $utmMedium): self
    {
        $obj = clone $this;
        $obj['utm_medium'] = $utmMedium;

        return $obj;
    }

    public function withUtmName(?string $utmName): self
    {
        $obj = clone $this;
        $obj['utm_name'] = $utmName;

        return $obj;
    }

    public function withUtmSource(?string $utmSource): self
    {
        $obj = clone $this;
        $obj['utm_source'] = $utmSource;

        return $obj;
    }

    public function withUtmTerm(?string $utmTerm): self
    {
        $obj = clone $this;
        $obj['utm_term'] = $utmTerm;

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
