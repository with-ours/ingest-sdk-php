<?php

declare(strict_types=1);

namespace OursPrivacy\Track\TrackEventParams;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion\MapOf;
use OursPrivacy\Track\TrackEventParams\UserProperties\Consent;
use OursPrivacy\Track\TrackEventParams\UserProperties\CustomProperty;
use OursPrivacy\Track\TrackEventParams\UserProperties\IsBot;
use OursPrivacy\Track\TrackEventParams\UserProperties\PhoneNumber;
use OursPrivacy\Track\TrackEventParams\UserProperties\Zip;

/**
 * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
 *
 * @phpstan-import-type ConsentVariants from \OursPrivacy\Track\TrackEventParams\UserProperties\Consent
 * @phpstan-import-type CustomPropertyVariants from \OursPrivacy\Track\TrackEventParams\UserProperties\CustomProperty
 * @phpstan-import-type IsBotVariants from \OursPrivacy\Track\TrackEventParams\UserProperties\IsBot
 * @phpstan-import-type PhoneNumberVariants from \OursPrivacy\Track\TrackEventParams\UserProperties\PhoneNumber
 * @phpstan-import-type ZipVariants from \OursPrivacy\Track\TrackEventParams\UserProperties\Zip
 * @phpstan-import-type ConsentShape from \OursPrivacy\Track\TrackEventParams\UserProperties\Consent
 * @phpstan-import-type CustomPropertyShape from \OursPrivacy\Track\TrackEventParams\UserProperties\CustomProperty
 * @phpstan-import-type IsBotShape from \OursPrivacy\Track\TrackEventParams\UserProperties\IsBot
 * @phpstan-import-type PhoneNumberShape from \OursPrivacy\Track\TrackEventParams\UserProperties\PhoneNumber
 * @phpstan-import-type ZipShape from \OursPrivacy\Track\TrackEventParams\UserProperties\Zip
 *
 * @phpstan-type UserPropertiesShape = array{
 *   _efTransactionID?: string|null,
 *   adID?: string|null,
 *   admitadUid?: string|null,
 *   adsetID?: string|null,
 *   alart?: string|null,
 *   aleid?: string|null,
 *   axwrt?: string|null,
 *   basisCid?: string|null,
 *   beeswaxAuctionID?: string|null,
 *   campaignID?: string|null,
 *   city?: string|null,
 *   clickid?: string|null,
 *   clid?: string|null,
 *   companyName?: string|null,
 *   consent?: array<string,ConsentShape|null>|null,
 *   country?: string|null,
 *   customProperties?: array<string,CustomPropertyShape|null>|null,
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
 *   graid?: string|null,
 *   grclid?: string|null,
 *   imRef?: string|null,
 *   ip?: string|null,
 *   irclickid?: string|null,
 *   isBot?: IsBotShape|null,
 *   jobTitle?: string|null,
 *   lastName?: string|null,
 *   liFatID?: string|null,
 *   msclkid?: string|null,
 *   ndclid?: string|null,
 *   obClickID?: string|null,
 *   oppref?: string|null,
 *   phoneNumber?: PhoneNumberShape|null,
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
 *   viantClickID?: string|null,
 *   viantImpressionID?: string|null,
 *   wbraid?: string|null,
 *   zip?: ZipShape|null,
 * }
 */
final class UserProperties implements BaseModel
{
    /** @use SdkModel<UserPropertiesShape> */
    use SdkModel;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('_ef_transaction_id', nullable: true)]
    public ?string $_efTransactionID;

    #[Optional('ad_id', nullable: true)]
    public ?string $adID;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('admitad_uid', nullable: true)]
    public ?string $admitadUid;

    #[Optional('adset_id', nullable: true)]
    public ?string $adsetID;

    #[Optional(nullable: true)]
    public ?string $alart;

    #[Optional(nullable: true)]
    public ?string $aleid;

    #[Optional(nullable: true)]
    public ?string $axwrt;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('basis_cid', nullable: true)]
    public ?string $basisCid;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('beeswax_auction_id', nullable: true)]
    public ?string $beeswaxAuctionID;

    #[Optional('campaign_id', nullable: true)]
    public ?string $campaignID;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $clickid;

    #[Optional(nullable: true)]
    public ?string $clid;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('company_name', nullable: true)]
    public ?string $companyName;

    /**
     * Use at most 200 nonempty property keys and five object levels. Array contents do not count toward the object-depth limit. Empty keys are removed recursively, arrays are truncated to 250 entries, and top-level numbers outside the safe integer range become strings. After normalization, the serialized JSON must be shorter than 1,048,576 UTF-16 code units.
     *
     * @var array<string,ConsentVariants|null>|null $consent
     */
    #[Optional(type: new MapOf(Consent::class, nullable: true), nullable: true)]
    public ?array $consent;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $country;

    /**
     * Use at most 200 nonempty property keys and five object levels. Array contents do not count toward the object-depth limit. Empty keys are removed recursively, arrays are truncated to 250 entries, and top-level numbers outside the safe integer range become strings. After normalization, the serialized JSON must be shorter than 1,048,576 UTF-16 code units.
     *
     * @var array<string,CustomPropertyVariants|null>|null $customProperties
     */
    #[Optional(
        'custom_properties',
        type: new MapOf(CustomProperty::class, nullable: true),
        nullable: true,
    )]
    public ?array $customProperties;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional('date_of_birth', nullable: true)]
    public ?string $dateOfBirth;

    #[Optional(nullable: true)]
    public ?string $dclid;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $epik;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional('external_id', nullable: true)]
    public ?string $externalID;

    #[Optional(nullable: true)]
    public ?string $fbc;

    #[Optional(nullable: true)]
    public ?string $fbclid;

    #[Optional(nullable: true)]
    public ?string $fbp;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional('first_name', nullable: true)]
    public ?string $firstName;

    #[Optional('gad_source', nullable: true)]
    public ?string $gadSource;

    #[Optional(nullable: true)]
    public ?string $gbraid;

    #[Optional(nullable: true)]
    public ?string $gclid;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $gender;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $graid;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $grclid;

    #[Optional('im_ref', nullable: true)]
    public ?string $imRef;

    /**
     * The IP address of the user Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $ip;

    #[Optional(nullable: true)]
    public ?string $irclickid;

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @var IsBotVariants|null $isBot
     */
    #[Optional('is_bot', union: IsBot::class, nullable: true)]
    public string|float|bool|array|null $isBot;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('job_title', nullable: true)]
    public ?string $jobTitle;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    #[Optional('last_name', nullable: true)]
    public ?string $lastName;

    #[Optional('li_fat_id', nullable: true)]
    public ?string $liFatID;

    #[Optional(nullable: true)]
    public ?string $msclkid;

    #[Optional(nullable: true)]
    public ?string $ndclid;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('ob_click_id', nullable: true)]
    public ?string $obClickID;

    #[Optional(nullable: true)]
    public ?string $oppref;

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @var PhoneNumberVariants|null $phoneNumber
     */
    #[Optional('phone_number', union: PhoneNumber::class, nullable: true)]
    public string|float|bool|array|null $phoneNumber;

    #[Optional(nullable: true)]
    public ?string $qclid;

    #[Optional('rdt_cid', nullable: true)]
    public ?string $rdtCid;

    #[Optional(nullable: true)]
    public ?string $referrer;

    #[Optional('referring_domain', nullable: true)]
    public ?string $referringDomain;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional(nullable: true)]
    public ?string $sacid;

    #[Optional(nullable: true)]
    public ?string $sccid;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional(nullable: true)]
    public ?string $sid;

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_campaign', nullable: true)]
    public ?string $utmCampaign;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_content', nullable: true)]
    public ?string $utmContent;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_medium', nullable: true)]
    public ?string $utmMedium;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_name', nullable: true)]
    public ?string $utmName;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_source', nullable: true)]
    public ?string $utmSource;

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    #[Optional('utm_term', nullable: true)]
    public ?string $utmTerm;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('viant_click_id', nullable: true)]
    public ?string $viantClickID;

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    #[Optional('viant_impression_id', nullable: true)]
    public ?string $viantImpressionID;

    #[Optional(nullable: true)]
    public ?string $wbraid;

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @var ZipVariants|null $zip
     */
    #[Optional(union: Zip::class, nullable: true)]
    public string|float|bool|array|null $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,ConsentShape|null>|null $consent
     * @param array<string,CustomPropertyShape|null>|null $customProperties
     * @param IsBotShape|null $isBot
     * @param PhoneNumberShape|null $phoneNumber
     * @param ZipShape|null $zip
     */
    public static function with(
        ?string $_efTransactionID = null,
        ?string $adID = null,
        ?string $admitadUid = null,
        ?string $adsetID = null,
        ?string $alart = null,
        ?string $aleid = null,
        ?string $axwrt = null,
        ?string $basisCid = null,
        ?string $beeswaxAuctionID = null,
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
        ?string $graid = null,
        ?string $grclid = null,
        ?string $imRef = null,
        ?string $ip = null,
        ?string $irclickid = null,
        string|float|bool|array|null $isBot = null,
        ?string $jobTitle = null,
        ?string $lastName = null,
        ?string $liFatID = null,
        ?string $msclkid = null,
        ?string $ndclid = null,
        ?string $obClickID = null,
        ?string $oppref = null,
        string|float|bool|array|null $phoneNumber = null,
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
        ?string $viantClickID = null,
        ?string $viantImpressionID = null,
        ?string $wbraid = null,
        string|float|bool|array|null $zip = null,
    ): self {
        $self = new self;

        null !== $_efTransactionID && $self['_efTransactionID'] = $_efTransactionID;
        null !== $adID && $self['adID'] = $adID;
        null !== $admitadUid && $self['admitadUid'] = $admitadUid;
        null !== $adsetID && $self['adsetID'] = $adsetID;
        null !== $alart && $self['alart'] = $alart;
        null !== $aleid && $self['aleid'] = $aleid;
        null !== $axwrt && $self['axwrt'] = $axwrt;
        null !== $basisCid && $self['basisCid'] = $basisCid;
        null !== $beeswaxAuctionID && $self['beeswaxAuctionID'] = $beeswaxAuctionID;
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
        null !== $graid && $self['graid'] = $graid;
        null !== $grclid && $self['grclid'] = $grclid;
        null !== $imRef && $self['imRef'] = $imRef;
        null !== $ip && $self['ip'] = $ip;
        null !== $irclickid && $self['irclickid'] = $irclickid;
        null !== $isBot && $self['isBot'] = $isBot;
        null !== $jobTitle && $self['jobTitle'] = $jobTitle;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $liFatID && $self['liFatID'] = $liFatID;
        null !== $msclkid && $self['msclkid'] = $msclkid;
        null !== $ndclid && $self['ndclid'] = $ndclid;
        null !== $obClickID && $self['obClickID'] = $obClickID;
        null !== $oppref && $self['oppref'] = $oppref;
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
        null !== $viantClickID && $self['viantClickID'] = $viantClickID;
        null !== $viantImpressionID && $self['viantImpressionID'] = $viantImpressionID;
        null !== $wbraid && $self['wbraid'] = $wbraid;
        null !== $zip && $self['zip'] = $zip;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withEfTransactionID(?string $_efTransactionID): self
    {
        $self = clone $this;
        $self['_efTransactionID'] = $_efTransactionID;

        return $self;
    }

    public function withAdID(?string $adID): self
    {
        $self = clone $this;
        $self['adID'] = $adID;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withAdmitadUid(?string $admitadUid): self
    {
        $self = clone $this;
        $self['admitadUid'] = $admitadUid;

        return $self;
    }

    public function withAdsetID(?string $adsetID): self
    {
        $self = clone $this;
        $self['adsetID'] = $adsetID;

        return $self;
    }

    public function withAlart(?string $alart): self
    {
        $self = clone $this;
        $self['alart'] = $alart;

        return $self;
    }

    public function withAleid(?string $aleid): self
    {
        $self = clone $this;
        $self['aleid'] = $aleid;

        return $self;
    }

    public function withAxwrt(?string $axwrt): self
    {
        $self = clone $this;
        $self['axwrt'] = $axwrt;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withBasisCid(?string $basisCid): self
    {
        $self = clone $this;
        $self['basisCid'] = $basisCid;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withBeeswaxAuctionID(?string $beeswaxAuctionID): self
    {
        $self = clone $this;
        $self['beeswaxAuctionID'] = $beeswaxAuctionID;

        return $self;
    }

    public function withCampaignID(?string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withCompanyName(?string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * Use at most 200 nonempty property keys and five object levels. Array contents do not count toward the object-depth limit. Empty keys are removed recursively, arrays are truncated to 250 entries, and top-level numbers outside the safe integer range become strings. After normalization, the serialized JSON must be shorter than 1,048,576 UTF-16 code units.
     *
     * @param array<string,ConsentShape|null>|null $consent
     */
    public function withConsent(?array $consent): self
    {
        $self = clone $this;
        $self['consent'] = $consent;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Use at most 200 nonempty property keys and five object levels. Array contents do not count toward the object-depth limit. Empty keys are removed recursively, arrays are truncated to 250 entries, and top-level numbers outside the safe integer range become strings. After normalization, the serialized JSON must be shorter than 1,048,576 UTF-16 code units.
     *
     * @param array<string,CustomPropertyShape|null>|null $customProperties
     */
    public function withCustomProperties(?array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withEpik(?string $epik): self
    {
        $self = clone $this;
        $self['epik'] = $epik;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
    public function withGender(?string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withGraid(?string $graid): self
    {
        $self = clone $this;
        $self['graid'] = $graid;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withGrclid(?string $grclid): self
    {
        $self = clone $this;
        $self['grclid'] = $grclid;

        return $self;
    }

    public function withImRef(?string $imRef): self
    {
        $self = clone $this;
        $self['imRef'] = $imRef;

        return $self;
    }

    /**
     * The IP address of the user Leading and trailing whitespace is removed before validation.
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

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @param IsBotShape|null $isBot
     */
    public function withIsBot(string|float|bool|array|null $isBot): self
    {
        $self = clone $this;
        $self['isBot'] = $isBot;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withJobTitle(?string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withObClickID(?string $obClickID): self
    {
        $self = clone $this;
        $self['obClickID'] = $obClickID;

        return $self;
    }

    public function withOppref(?string $oppref): self
    {
        $self = clone $this;
        $self['oppref'] = $oppref;

        return $self;
    }

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @param PhoneNumberShape|null $phoneNumber
     */
    public function withPhoneNumber(
        string|float|bool|array|null $phoneNumber
    ): self {
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

    /**
     * Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withSid(?string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string. Leading and trailing whitespace is removed before validation.
     */
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

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmCampaign(?string $utmCampaign): self
    {
        $self = clone $this;
        $self['utmCampaign'] = $utmCampaign;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmContent(?string $utmContent): self
    {
        $self = clone $this;
        $self['utmContent'] = $utmContent;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmMedium(?string $utmMedium): self
    {
        $self = clone $this;
        $self['utmMedium'] = $utmMedium;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmName(?string $utmName): self
    {
        $self = clone $this;
        $self['utmName'] = $utmName;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmSource(?string $utmSource): self
    {
        $self = clone $this;
        $self['utmSource'] = $utmSource;

        return $self;
    }

    /**
     * Non-string input is converted to text before validation; clients should send a string.
     */
    public function withUtmTerm(?string $utmTerm): self
    {
        $self = clone $this;
        $self['utmTerm'] = $utmTerm;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withViantClickID(?string $viantClickID): self
    {
        $self = clone $this;
        $self['viantClickID'] = $viantClickID;

        return $self;
    }

    /**
     * Leading and trailing whitespace is removed before validation.
     */
    public function withViantImpressionID(?string $viantImpressionID): self
    {
        $self = clone $this;
        $self['viantImpressionID'] = $viantImpressionID;

        return $self;
    }

    public function withWbraid(?string $wbraid): self
    {
        $self = clone $this;
        $self['wbraid'] = $wbraid;

        return $self;
    }

    /**
     * Any JSON value: string, number, boolean, array, object, or null.
     *
     * @param ZipShape|null $zip
     */
    public function withZip(string|float|bool|array|null $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
