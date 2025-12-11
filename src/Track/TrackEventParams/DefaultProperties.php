<?php

declare(strict_types=1);

namespace OursPrivacy\Track\TrackEventParams;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * These properties are used throughout the Ours app to pass known values onto destinations.
 *
 * @phpstan-type DefaultPropertiesShape = array{
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
 * }
 */
final class DefaultProperties implements BaseModel
{
    /** @use SdkModel<DefaultPropertiesShape> */
    use SdkModel;

    /**
     * The active time in milliseconds that the user had this tab active.
     */
    #[Optional(nullable: true)]
    public ?float $activeDuration;

    /**
     * The ad id for detected in the session. This is set by the web sdk automatically.
     */
    #[Optional('ad_id', nullable: true)]
    public ?string $adID;

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    #[Optional('adset_id', nullable: true)]
    public ?string $adsetID;

    /**
     * The Basis DSP Click ID. Ex: basis_cid123.
     */
    #[Optional('basis_cid', nullable: true)]
    public ?string $basisCid;

    /**
     * The language of the browser. Ex: en-US.
     */
    #[Optional('browser_language', nullable: true)]
    public ?string $browserLanguage;

    /**
     * The name of the browser. Ex: Chrome.
     */
    #[Optional('browser_name', nullable: true)]
    public ?string $browserName;

    /**
     * The version of the browser. Ex: 114.0.
     */
    #[Optional('browser_version', nullable: true)]
    public ?string $browserVersion;

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    #[Optional('campaign_id', nullable: true)]
    public ?string $campaignID;

    /**
     * The Click ID. Ex: clickid123.
     */
    #[Optional(nullable: true)]
    public ?string $clickid;

    /**
     * The Generic Click ID. Ex: clid123.
     */
    #[Optional(nullable: true)]
    public ?string $clid;

    /**
     * The architecture of the CPU. Ex: x64.
     */
    #[Optional('cpu_architecture', nullable: true)]
    public ?string $cpuArchitecture;

    /**
     * The full url (including query params) of the current page.
     */
    #[Optional('current_url', nullable: true)]
    public ?string $currentURL;

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    #[Optional(nullable: true)]
    public ?string $dclid;

    /**
     * The model of the device. Ex: iPhone 13.
     */
    #[Optional('device_model', nullable: true)]
    public ?string $deviceModel;

    /**
     * The type of device the user is using. Ex: mobile.
     */
    #[Optional('device_type', nullable: true)]
    public ?string $deviceType;

    /**
     * The vendor of the device. Ex: Apple.
     */
    #[Optional('device_vendor', nullable: true)]
    public ?string $deviceVendor;

    /**
     * The time in milliseconds since the page was loaded // script was loaded.
     */
    #[Optional(nullable: true)]
    public ?float $duration;

    /**
     * The browsers encoding. Ex: UTF-8.
     */
    #[Optional(nullable: true)]
    public ?string $encoding;

    /**
     * The name of the browser engine. Ex: Blink.
     */
    #[Optional('engine_name', nullable: true)]
    public ?string $engineName;

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    #[Optional('engine_version', nullable: true)]
    public ?string $engineVersion;

    /**
     * The Pinterest Click ID. Ex: epik456.
     */
    #[Optional(nullable: true)]
    public ?string $epik;

    /**
     * Facebook Click ID with prefix format for Conversions API tracking. Ex: fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    #[Optional(nullable: true)]
    public ?string $fbc;

    /**
     * Raw Facebook Click ID query parameter without prefix from ad clicks. Ex: AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    #[Optional(nullable: true)]
    public ?string $fbclid;

    /**
     * Facebook Browser ID parameter for identifying browsers and attributing events. Ex: fb.1.1554763741205.1098115397.
     */
    #[Optional(nullable: true)]
    public ?string $fbp;

    /**
     * Deprecated.
     */
    #[Optional(nullable: true)]
    public ?bool $fv;

    /**
     * The Google Ad Source. Ex: google.
     */
    #[Optional('gad_source', nullable: true)]
    public ?string $gadSource;

    /**
     * The Google Braid ID. Ex: gbraid123.
     */
    #[Optional(nullable: true)]
    public ?string $gbraid;

    /**
     * The Google Click ID. Ex: gclid123.
     */
    #[Optional(nullable: true)]
    public ?string $gclid;

    /**
     * The host of the current page. Ex: example.com.
     */
    #[Optional(nullable: true)]
    public ?string $host;

    /**
     * Whether the user is in an iframe. Ex: true.
     */
    #[Optional(nullable: true)]
    public ?bool $iframe;

    /**
     * The Impact Click ID reference. Ex: im_ref123.
     */
    #[Optional('im_ref', nullable: true)]
    public ?string $imRef;

    /**
     * The IP address of the user. Ex: 127.0.0.1.
     */
    #[Optional(nullable: true)]
    public ?string $ip;

    /**
     * The Impact Click ID. Ex: irclickid123.
     */
    #[Optional(nullable: true)]
    public ?string $irclickid;

    /**
     * Whether we have detected that the user is a bot. This is set automatically by the Ours server primarily for events tracked through the web SDK.
     */
    #[Optional('is_bot')]
    public mixed $isBot;

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    #[Optional('li_fat_id', nullable: true)]
    public ?string $liFatID;

    /**
     * The Microsoft Click ID. Ex: msclkid123.
     */
    #[Optional(nullable: true)]
    public ?string $msclkid;

    /**
     * The NextDoor Click ID. Ex: ndclid123.
     */
    #[Optional(nullable: true)]
    public ?string $ndclid;

    /**
     * Deprecated.
     */
    #[Optional('new_s', nullable: true)]
    public ?bool $newS;

    /**
     * The name of the operating system. Ex: Windows.
     */
    #[Optional('os_name', nullable: true)]
    public ?string $osName;

    /**
     * The version of the operating system. Ex: 10.0.
     */
    #[Optional('os_version', nullable: true)]
    public ?string $osVersion;

    /**
     * A random set of numbers for the page load.
     */
    #[Optional('page_hash', nullable: true)]
    public ?float $pageHash;

    /**
     * The pathname of the current page. Ex: /home.
     */
    #[Optional(nullable: true)]
    public ?string $pathname;

    /**
     * The Quora Click ID. Ex: qclid123.
     */
    #[Optional(nullable: true)]
    public ?string $qclid;

    /**
     * The Reddit Click ID. Ex: rdt_cid123.
     */
    #[Optional('rdt_cid', nullable: true)]
    public ?string $rdtCid;

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    #[Optional('received_at', nullable: true)]
    public ?string $receivedAt;

    /**
     * The referrer URL of the current page.
     */
    #[Optional(nullable: true)]
    public ?string $referrer;

    /**
     * The referring domain of the current page.
     */
    #[Optional('referring_domain', nullable: true)]
    public ?string $referringDomain;

    /**
     * The StackAdapt Tracking ID. Ex: sacid123.
     */
    #[Optional(nullable: true)]
    public ?string $sacid;

    /**
     * The SnapChat Click ID. Ex: sccid123.
     */
    #[Optional(nullable: true)]
    public ?string $sccid;

    /**
     * The height of the screen. Ex: 1080.
     */
    #[Optional('screen_height', nullable: true)]
    public ?float $screenHeight;

    /**
     * The width of the screen. Ex: 1920.
     */
    #[Optional('screen_width', nullable: true)]
    public ?float $screenWidth;

    /**
     * The number of sessions the user has had. Ex: 3.
     */
    #[Optional(nullable: true)]
    public ?float $sessionCount;

    /**
     * The session ID as assigned automatically by the web SDK. This is required for session replay.
     */
    #[Optional(nullable: true)]
    public ?string $sid;

    #[Optional(nullable: true)]
    public ?string $sr;

    /**
     * The title of the current page.
     */
    #[Optional(nullable: true)]
    public ?string $title;

    /**
     * The TikTok Click ID. Ex: ttclid123.
     */
    #[Optional(nullable: true)]
    public ?string $ttclid;

    /**
     * The Twitter Click ID. Ex: twclid123.
     */
    #[Optional(nullable: true)]
    public ?string $twclid;

    /**
     * User agent as a full list of strings.
     */
    #[Optional(nullable: true)]
    public ?string $uafvl;

    /**
     * The user agent of the browser.
     */
    #[Optional('user_agent', nullable: true)]
    public ?string $userAgent;

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_campaign', nullable: true)]
    public ?string $utmCampaign;

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_content', nullable: true)]
    public ?string $utmContent;

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_medium', nullable: true)]
    public ?string $utmMedium;

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_name', nullable: true)]
    public ?string $utmName;

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_source', nullable: true)]
    public ?string $utmSource;

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    #[Optional('utm_term', nullable: true)]
    public ?string $utmTerm;

    /**
     * The version of the web SDK.
     */
    #[Optional(nullable: true)]
    public ?string $version;

    /**
     * The WBRAID Identifier. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $wbraid;

    /**
     * Whether the user is in a webview. Ex: true.
     */
    #[Optional(nullable: true)]
    public ?bool $webview;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?float $activeDuration = null,
        ?string $adID = null,
        ?string $adsetID = null,
        ?string $basisCid = null,
        ?string $browserLanguage = null,
        ?string $browserName = null,
        ?string $browserVersion = null,
        ?string $campaignID = null,
        ?string $clickid = null,
        ?string $clid = null,
        ?string $cpuArchitecture = null,
        ?string $currentURL = null,
        ?string $dclid = null,
        ?string $deviceModel = null,
        ?string $deviceType = null,
        ?string $deviceVendor = null,
        ?float $duration = null,
        ?string $encoding = null,
        ?string $engineName = null,
        ?string $engineVersion = null,
        ?string $epik = null,
        ?string $fbc = null,
        ?string $fbclid = null,
        ?string $fbp = null,
        ?bool $fv = null,
        ?string $gadSource = null,
        ?string $gbraid = null,
        ?string $gclid = null,
        ?string $host = null,
        ?bool $iframe = null,
        ?string $imRef = null,
        ?string $ip = null,
        ?string $irclickid = null,
        mixed $isBot = null,
        ?string $liFatID = null,
        ?string $msclkid = null,
        ?string $ndclid = null,
        ?bool $newS = null,
        ?string $osName = null,
        ?string $osVersion = null,
        ?float $pageHash = null,
        ?string $pathname = null,
        ?string $qclid = null,
        ?string $rdtCid = null,
        ?string $receivedAt = null,
        ?string $referrer = null,
        ?string $referringDomain = null,
        ?string $sacid = null,
        ?string $sccid = null,
        ?float $screenHeight = null,
        ?float $screenWidth = null,
        ?float $sessionCount = null,
        ?string $sid = null,
        ?string $sr = null,
        ?string $title = null,
        ?string $ttclid = null,
        ?string $twclid = null,
        ?string $uafvl = null,
        ?string $userAgent = null,
        ?string $utmCampaign = null,
        ?string $utmContent = null,
        ?string $utmMedium = null,
        ?string $utmName = null,
        ?string $utmSource = null,
        ?string $utmTerm = null,
        ?string $version = null,
        ?string $wbraid = null,
        ?bool $webview = null,
    ): self {
        $self = new self;

        null !== $activeDuration && $self['activeDuration'] = $activeDuration;
        null !== $adID && $self['adID'] = $adID;
        null !== $adsetID && $self['adsetID'] = $adsetID;
        null !== $basisCid && $self['basisCid'] = $basisCid;
        null !== $browserLanguage && $self['browserLanguage'] = $browserLanguage;
        null !== $browserName && $self['browserName'] = $browserName;
        null !== $browserVersion && $self['browserVersion'] = $browserVersion;
        null !== $campaignID && $self['campaignID'] = $campaignID;
        null !== $clickid && $self['clickid'] = $clickid;
        null !== $clid && $self['clid'] = $clid;
        null !== $cpuArchitecture && $self['cpuArchitecture'] = $cpuArchitecture;
        null !== $currentURL && $self['currentURL'] = $currentURL;
        null !== $dclid && $self['dclid'] = $dclid;
        null !== $deviceModel && $self['deviceModel'] = $deviceModel;
        null !== $deviceType && $self['deviceType'] = $deviceType;
        null !== $deviceVendor && $self['deviceVendor'] = $deviceVendor;
        null !== $duration && $self['duration'] = $duration;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $engineName && $self['engineName'] = $engineName;
        null !== $engineVersion && $self['engineVersion'] = $engineVersion;
        null !== $epik && $self['epik'] = $epik;
        null !== $fbc && $self['fbc'] = $fbc;
        null !== $fbclid && $self['fbclid'] = $fbclid;
        null !== $fbp && $self['fbp'] = $fbp;
        null !== $fv && $self['fv'] = $fv;
        null !== $gadSource && $self['gadSource'] = $gadSource;
        null !== $gbraid && $self['gbraid'] = $gbraid;
        null !== $gclid && $self['gclid'] = $gclid;
        null !== $host && $self['host'] = $host;
        null !== $iframe && $self['iframe'] = $iframe;
        null !== $imRef && $self['imRef'] = $imRef;
        null !== $ip && $self['ip'] = $ip;
        null !== $irclickid && $self['irclickid'] = $irclickid;
        null !== $isBot && $self['isBot'] = $isBot;
        null !== $liFatID && $self['liFatID'] = $liFatID;
        null !== $msclkid && $self['msclkid'] = $msclkid;
        null !== $ndclid && $self['ndclid'] = $ndclid;
        null !== $newS && $self['newS'] = $newS;
        null !== $osName && $self['osName'] = $osName;
        null !== $osVersion && $self['osVersion'] = $osVersion;
        null !== $pageHash && $self['pageHash'] = $pageHash;
        null !== $pathname && $self['pathname'] = $pathname;
        null !== $qclid && $self['qclid'] = $qclid;
        null !== $rdtCid && $self['rdtCid'] = $rdtCid;
        null !== $receivedAt && $self['receivedAt'] = $receivedAt;
        null !== $referrer && $self['referrer'] = $referrer;
        null !== $referringDomain && $self['referringDomain'] = $referringDomain;
        null !== $sacid && $self['sacid'] = $sacid;
        null !== $sccid && $self['sccid'] = $sccid;
        null !== $screenHeight && $self['screenHeight'] = $screenHeight;
        null !== $screenWidth && $self['screenWidth'] = $screenWidth;
        null !== $sessionCount && $self['sessionCount'] = $sessionCount;
        null !== $sid && $self['sid'] = $sid;
        null !== $sr && $self['sr'] = $sr;
        null !== $title && $self['title'] = $title;
        null !== $ttclid && $self['ttclid'] = $ttclid;
        null !== $twclid && $self['twclid'] = $twclid;
        null !== $uafvl && $self['uafvl'] = $uafvl;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $utmCampaign && $self['utmCampaign'] = $utmCampaign;
        null !== $utmContent && $self['utmContent'] = $utmContent;
        null !== $utmMedium && $self['utmMedium'] = $utmMedium;
        null !== $utmName && $self['utmName'] = $utmName;
        null !== $utmSource && $self['utmSource'] = $utmSource;
        null !== $utmTerm && $self['utmTerm'] = $utmTerm;
        null !== $version && $self['version'] = $version;
        null !== $wbraid && $self['wbraid'] = $wbraid;
        null !== $webview && $self['webview'] = $webview;

        return $self;
    }

    /**
     * The active time in milliseconds that the user had this tab active.
     */
    public function withActiveDuration(?float $activeDuration): self
    {
        $self = clone $this;
        $self['activeDuration'] = $activeDuration;

        return $self;
    }

    /**
     * The ad id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdID(?string $adID): self
    {
        $self = clone $this;
        $self['adID'] = $adID;

        return $self;
    }

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdsetID(?string $adsetID): self
    {
        $self = clone $this;
        $self['adsetID'] = $adsetID;

        return $self;
    }

    /**
     * The Basis DSP Click ID. Ex: basis_cid123.
     */
    public function withBasisCid(?string $basisCid): self
    {
        $self = clone $this;
        $self['basisCid'] = $basisCid;

        return $self;
    }

    /**
     * The language of the browser. Ex: en-US.
     */
    public function withBrowserLanguage(?string $browserLanguage): self
    {
        $self = clone $this;
        $self['browserLanguage'] = $browserLanguage;

        return $self;
    }

    /**
     * The name of the browser. Ex: Chrome.
     */
    public function withBrowserName(?string $browserName): self
    {
        $self = clone $this;
        $self['browserName'] = $browserName;

        return $self;
    }

    /**
     * The version of the browser. Ex: 114.0.
     */
    public function withBrowserVersion(?string $browserVersion): self
    {
        $self = clone $this;
        $self['browserVersion'] = $browserVersion;

        return $self;
    }

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    public function withCampaignID(?string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * The Click ID. Ex: clickid123.
     */
    public function withClickid(?string $clickid): self
    {
        $self = clone $this;
        $self['clickid'] = $clickid;

        return $self;
    }

    /**
     * The Generic Click ID. Ex: clid123.
     */
    public function withClid(?string $clid): self
    {
        $self = clone $this;
        $self['clid'] = $clid;

        return $self;
    }

    /**
     * The architecture of the CPU. Ex: x64.
     */
    public function withCPUArchitecture(?string $cpuArchitecture): self
    {
        $self = clone $this;
        $self['cpuArchitecture'] = $cpuArchitecture;

        return $self;
    }

    /**
     * The full url (including query params) of the current page.
     */
    public function withCurrentURL(?string $currentURL): self
    {
        $self = clone $this;
        $self['currentURL'] = $currentURL;

        return $self;
    }

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    public function withDclid(?string $dclid): self
    {
        $self = clone $this;
        $self['dclid'] = $dclid;

        return $self;
    }

    /**
     * The model of the device. Ex: iPhone 13.
     */
    public function withDeviceModel(?string $deviceModel): self
    {
        $self = clone $this;
        $self['deviceModel'] = $deviceModel;

        return $self;
    }

    /**
     * The type of device the user is using. Ex: mobile.
     */
    public function withDeviceType(?string $deviceType): self
    {
        $self = clone $this;
        $self['deviceType'] = $deviceType;

        return $self;
    }

    /**
     * The vendor of the device. Ex: Apple.
     */
    public function withDeviceVendor(?string $deviceVendor): self
    {
        $self = clone $this;
        $self['deviceVendor'] = $deviceVendor;

        return $self;
    }

    /**
     * The time in milliseconds since the page was loaded // script was loaded.
     */
    public function withDuration(?float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The browsers encoding. Ex: UTF-8.
     */
    public function withEncoding(?string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * The name of the browser engine. Ex: Blink.
     */
    public function withEngineName(?string $engineName): self
    {
        $self = clone $this;
        $self['engineName'] = $engineName;

        return $self;
    }

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    public function withEngineVersion(?string $engineVersion): self
    {
        $self = clone $this;
        $self['engineVersion'] = $engineVersion;

        return $self;
    }

    /**
     * The Pinterest Click ID. Ex: epik456.
     */
    public function withEpik(?string $epik): self
    {
        $self = clone $this;
        $self['epik'] = $epik;

        return $self;
    }

    /**
     * Facebook Click ID with prefix format for Conversions API tracking. Ex: fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbc(?string $fbc): self
    {
        $self = clone $this;
        $self['fbc'] = $fbc;

        return $self;
    }

    /**
     * Raw Facebook Click ID query parameter without prefix from ad clicks. Ex: AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbclid(?string $fbclid): self
    {
        $self = clone $this;
        $self['fbclid'] = $fbclid;

        return $self;
    }

    /**
     * Facebook Browser ID parameter for identifying browsers and attributing events. Ex: fb.1.1554763741205.1098115397.
     */
    public function withFbp(?string $fbp): self
    {
        $self = clone $this;
        $self['fbp'] = $fbp;

        return $self;
    }

    /**
     * Deprecated.
     */
    public function withFv(?bool $fv): self
    {
        $self = clone $this;
        $self['fv'] = $fv;

        return $self;
    }

    /**
     * The Google Ad Source. Ex: google.
     */
    public function withGadSource(?string $gadSource): self
    {
        $self = clone $this;
        $self['gadSource'] = $gadSource;

        return $self;
    }

    /**
     * The Google Braid ID. Ex: gbraid123.
     */
    public function withGbraid(?string $gbraid): self
    {
        $self = clone $this;
        $self['gbraid'] = $gbraid;

        return $self;
    }

    /**
     * The Google Click ID. Ex: gclid123.
     */
    public function withGclid(?string $gclid): self
    {
        $self = clone $this;
        $self['gclid'] = $gclid;

        return $self;
    }

    /**
     * The host of the current page. Ex: example.com.
     */
    public function withHost(?string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    /**
     * Whether the user is in an iframe. Ex: true.
     */
    public function withIframe(?bool $iframe): self
    {
        $self = clone $this;
        $self['iframe'] = $iframe;

        return $self;
    }

    /**
     * The Impact Click ID reference. Ex: im_ref123.
     */
    public function withImRef(?string $imRef): self
    {
        $self = clone $this;
        $self['imRef'] = $imRef;

        return $self;
    }

    /**
     * The IP address of the user. Ex: 127.0.0.1.
     */
    public function withIP(?string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    /**
     * The Impact Click ID. Ex: irclickid123.
     */
    public function withIrclickid(?string $irclickid): self
    {
        $self = clone $this;
        $self['irclickid'] = $irclickid;

        return $self;
    }

    /**
     * Whether we have detected that the user is a bot. This is set automatically by the Ours server primarily for events tracked through the web SDK.
     */
    public function withIsBot(mixed $isBot): self
    {
        $self = clone $this;
        $self['isBot'] = $isBot;

        return $self;
    }

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    public function withLiFatID(?string $liFatID): self
    {
        $self = clone $this;
        $self['liFatID'] = $liFatID;

        return $self;
    }

    /**
     * The Microsoft Click ID. Ex: msclkid123.
     */
    public function withMsclkid(?string $msclkid): self
    {
        $self = clone $this;
        $self['msclkid'] = $msclkid;

        return $self;
    }

    /**
     * The NextDoor Click ID. Ex: ndclid123.
     */
    public function withNdclid(?string $ndclid): self
    {
        $self = clone $this;
        $self['ndclid'] = $ndclid;

        return $self;
    }

    /**
     * Deprecated.
     */
    public function withNewS(?bool $newS): self
    {
        $self = clone $this;
        $self['newS'] = $newS;

        return $self;
    }

    /**
     * The name of the operating system. Ex: Windows.
     */
    public function withOsName(?string $osName): self
    {
        $self = clone $this;
        $self['osName'] = $osName;

        return $self;
    }

    /**
     * The version of the operating system. Ex: 10.0.
     */
    public function withOsVersion(?string $osVersion): self
    {
        $self = clone $this;
        $self['osVersion'] = $osVersion;

        return $self;
    }

    /**
     * A random set of numbers for the page load.
     */
    public function withPageHash(?float $pageHash): self
    {
        $self = clone $this;
        $self['pageHash'] = $pageHash;

        return $self;
    }

    /**
     * The pathname of the current page. Ex: /home.
     */
    public function withPathname(?string $pathname): self
    {
        $self = clone $this;
        $self['pathname'] = $pathname;

        return $self;
    }

    /**
     * The Quora Click ID. Ex: qclid123.
     */
    public function withQclid(?string $qclid): self
    {
        $self = clone $this;
        $self['qclid'] = $qclid;

        return $self;
    }

    /**
     * The Reddit Click ID. Ex: rdt_cid123.
     */
    public function withRdtCid(?string $rdtCid): self
    {
        $self = clone $this;
        $self['rdtCid'] = $rdtCid;

        return $self;
    }

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    public function withReceivedAt(?string $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    /**
     * The referrer URL of the current page.
     */
    public function withReferrer(?string $referrer): self
    {
        $self = clone $this;
        $self['referrer'] = $referrer;

        return $self;
    }

    /**
     * The referring domain of the current page.
     */
    public function withReferringDomain(?string $referringDomain): self
    {
        $self = clone $this;
        $self['referringDomain'] = $referringDomain;

        return $self;
    }

    /**
     * The StackAdapt Tracking ID. Ex: sacid123.
     */
    public function withSacid(?string $sacid): self
    {
        $self = clone $this;
        $self['sacid'] = $sacid;

        return $self;
    }

    /**
     * The SnapChat Click ID. Ex: sccid123.
     */
    public function withSccid(?string $sccid): self
    {
        $self = clone $this;
        $self['sccid'] = $sccid;

        return $self;
    }

    /**
     * The height of the screen. Ex: 1080.
     */
    public function withScreenHeight(?float $screenHeight): self
    {
        $self = clone $this;
        $self['screenHeight'] = $screenHeight;

        return $self;
    }

    /**
     * The width of the screen. Ex: 1920.
     */
    public function withScreenWidth(?float $screenWidth): self
    {
        $self = clone $this;
        $self['screenWidth'] = $screenWidth;

        return $self;
    }

    /**
     * The number of sessions the user has had. Ex: 3.
     */
    public function withSessionCount(?float $sessionCount): self
    {
        $self = clone $this;
        $self['sessionCount'] = $sessionCount;

        return $self;
    }

    /**
     * The session ID as assigned automatically by the web SDK. This is required for session replay.
     */
    public function withSid(?string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    public function withSr(?string $sr): self
    {
        $self = clone $this;
        $self['sr'] = $sr;

        return $self;
    }

    /**
     * The title of the current page.
     */
    public function withTitle(?string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * The TikTok Click ID. Ex: ttclid123.
     */
    public function withTtclid(?string $ttclid): self
    {
        $self = clone $this;
        $self['ttclid'] = $ttclid;

        return $self;
    }

    /**
     * The Twitter Click ID. Ex: twclid123.
     */
    public function withTwclid(?string $twclid): self
    {
        $self = clone $this;
        $self['twclid'] = $twclid;

        return $self;
    }

    /**
     * User agent as a full list of strings.
     */
    public function withUafvl(?string $uafvl): self
    {
        $self = clone $this;
        $self['uafvl'] = $uafvl;

        return $self;
    }

    /**
     * The user agent of the browser.
     */
    public function withUserAgent(?string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    public function withUtmCampaign(?string $utmCampaign): self
    {
        $self = clone $this;
        $self['utmCampaign'] = $utmCampaign;

        return $self;
    }

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    public function withUtmContent(?string $utmContent): self
    {
        $self = clone $this;
        $self['utmContent'] = $utmContent;

        return $self;
    }

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    public function withUtmMedium(?string $utmMedium): self
    {
        $self = clone $this;
        $self['utmMedium'] = $utmMedium;

        return $self;
    }

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    public function withUtmName(?string $utmName): self
    {
        $self = clone $this;
        $self['utmName'] = $utmName;

        return $self;
    }

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    public function withUtmSource(?string $utmSource): self
    {
        $self = clone $this;
        $self['utmSource'] = $utmSource;

        return $self;
    }

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    public function withUtmTerm(?string $utmTerm): self
    {
        $self = clone $this;
        $self['utmTerm'] = $utmTerm;

        return $self;
    }

    /**
     * The version of the web SDK.
     */
    public function withVersion(?string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }

    /**
     * The WBRAID Identifier. The web SDK automatically captures this from the query params.
     */
    public function withWbraid(?string $wbraid): self
    {
        $self = clone $this;
        $self['wbraid'] = $wbraid;

        return $self;
    }

    /**
     * Whether the user is in a webview. Ex: true.
     */
    public function withWebview(?bool $webview): self
    {
        $self = clone $this;
        $self['webview'] = $webview;

        return $self;
    }
}
