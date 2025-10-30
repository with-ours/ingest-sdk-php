<?php

declare(strict_types=1);

namespace OursPrivacy\Track\TrackCreateEventParams;

use OursPrivacy\Core\Attributes\Api;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * These properties are used throughout the Ours app to pass known values onto destinations.
 *
 * @phpstan-type DefaultPropertiesShape = array{
 *   activeDuration?: float|null,
 *   adID?: string|null,
 *   adsetID?: string|null,
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
 *   ip?: string|null,
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
    #[Api(nullable: true, optional: true)]
    public ?float $activeDuration;

    /**
     * The ad id for detected in the session. This is set by the web sdk automatically.
     */
    #[Api('ad_id', nullable: true, optional: true)]
    public ?string $adID;

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    #[Api('adset_id', nullable: true, optional: true)]
    public ?string $adsetID;

    /**
     * The language of the browser. Ex: en-US.
     */
    #[Api('browser_language', nullable: true, optional: true)]
    public ?string $browserLanguage;

    /**
     * The name of the browser. Ex: Chrome.
     */
    #[Api('browser_name', nullable: true, optional: true)]
    public ?string $browserName;

    /**
     * The version of the browser. Ex: 114.0.
     */
    #[Api('browser_version', nullable: true, optional: true)]
    public ?string $browserVersion;

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    #[Api('campaign_id', nullable: true, optional: true)]
    public ?string $campaignID;

    /**
     * The Click ID. Ex: clickid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $clickid;

    /**
     * The Generic Click ID. Ex: clid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $clid;

    /**
     * The architecture of the CPU. Ex: x64.
     */
    #[Api('cpu_architecture', nullable: true, optional: true)]
    public ?string $cpuArchitecture;

    /**
     * The full url (including query params) of the current page.
     */
    #[Api('current_url', nullable: true, optional: true)]
    public ?string $currentURL;

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $dclid;

    /**
     * The model of the device. Ex: iPhone 13.
     */
    #[Api('device_model', nullable: true, optional: true)]
    public ?string $deviceModel;

    /**
     * The type of device the user is using. Ex: mobile.
     */
    #[Api('device_type', nullable: true, optional: true)]
    public ?string $deviceType;

    /**
     * The vendor of the device. Ex: Apple.
     */
    #[Api('device_vendor', nullable: true, optional: true)]
    public ?string $deviceVendor;

    /**
     * The time in milliseconds since the page was loaded // script was loaded.
     */
    #[Api(nullable: true, optional: true)]
    public ?float $duration;

    /**
     * The browsers encoding. Ex: UTF-8.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $encoding;

    /**
     * The name of the browser engine. Ex: Blink.
     */
    #[Api('engine_name', nullable: true, optional: true)]
    public ?string $engineName;

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    #[Api('engine_version', nullable: true, optional: true)]
    public ?string $engineVersion;

    /**
     * The Pinterest Click ID. Ex: epik456.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $epik;

    /**
     * Facebook Click ID with prefix format for Conversions API tracking. Ex: fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $fbc;

    /**
     * Raw Facebook Click ID query parameter without prefix from ad clicks. Ex: AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $fbclid;

    /**
     * Facebook Browser ID parameter for identifying browsers and attributing events. Ex: fb.1.1554763741205.1098115397.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $fbp;

    /**
     * Deprecated.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $fv;

    /**
     * The Google Ad Source. Ex: google.
     */
    #[Api('gad_source', nullable: true, optional: true)]
    public ?string $gadSource;

    /**
     * The Google Braid ID. Ex: gbraid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $gbraid;

    /**
     * The Google Click ID. Ex: gclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $gclid;

    /**
     * The host of the current page. Ex: example.com.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $host;

    /**
     * Whether the user is in an iframe. Ex: true.
     */
    #[Api(nullable: true, optional: true)]
    public ?bool $iframe;

    /**
     * The IP address of the user. Ex: 127.0.0.1.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $ip;

    /**
     * Whether we have detected that the user is a bot. This is set automatically by the Ours server primarily for events tracked through the web SDK.
     */
    #[Api('is_bot', optional: true)]
    public mixed $isBot;

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    #[Api('li_fat_id', nullable: true, optional: true)]
    public ?string $liFatID;

    /**
     * The Microsoft Click ID. Ex: msclkid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $msclkid;

    /**
     * The NextDoor Click ID. Ex: ndclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $ndclid;

    /**
     * Deprecated.
     */
    #[Api('new_s', nullable: true, optional: true)]
    public ?bool $newS;

    /**
     * The name of the operating system. Ex: Windows.
     */
    #[Api('os_name', nullable: true, optional: true)]
    public ?string $osName;

    /**
     * The version of the operating system. Ex: 10.0.
     */
    #[Api('os_version', nullable: true, optional: true)]
    public ?string $osVersion;

    /**
     * A random set of numbers for the page load.
     */
    #[Api('page_hash', nullable: true, optional: true)]
    public ?float $pageHash;

    /**
     * The pathname of the current page. Ex: /home.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $pathname;

    /**
     * The Quora Click ID. Ex: qclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $qclid;

    /**
     * The Reddit Click ID. Ex: rdt_cid123.
     */
    #[Api('rdt_cid', nullable: true, optional: true)]
    public ?string $rdtCid;

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    #[Api('received_at', nullable: true, optional: true)]
    public ?string $receivedAt;

    /**
     * The referrer URL of the current page.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $referrer;

    /**
     * The StackAdapt Tracking ID. Ex: sacid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $sacid;

    /**
     * The SnapChat Click ID. Ex: sccid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $sccid;

    /**
     * The height of the screen. Ex: 1080.
     */
    #[Api('screen_height', nullable: true, optional: true)]
    public ?float $screenHeight;

    /**
     * The width of the screen. Ex: 1920.
     */
    #[Api('screen_width', nullable: true, optional: true)]
    public ?float $screenWidth;

    /**
     * The number of sessions the user has had. Ex: 3.
     */
    #[Api(nullable: true, optional: true)]
    public ?float $sessionCount;

    /**
     * The session ID as assigned automatically by the web SDK. This is required for session replay.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $sid;

    #[Api(nullable: true, optional: true)]
    public ?string $sr;

    /**
     * The title of the current page.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $title;

    /**
     * The TikTok Click ID. Ex: ttclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $ttclid;

    /**
     * The Twitter Click ID. Ex: twclid123.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $twclid;

    /**
     * User agent as a full list of strings.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $uafvl;

    /**
     * The user agent of the browser.
     */
    #[Api('user_agent', nullable: true, optional: true)]
    public ?string $userAgent;

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_campaign', nullable: true, optional: true)]
    public ?string $utmCampaign;

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_content', nullable: true, optional: true)]
    public ?string $utmContent;

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_medium', nullable: true, optional: true)]
    public ?string $utmMedium;

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_name', nullable: true, optional: true)]
    public ?string $utmName;

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_source', nullable: true, optional: true)]
    public ?string $utmSource;

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    #[Api('utm_term', nullable: true, optional: true)]
    public ?string $utmTerm;

    /**
     * The version of the web SDK.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $version;

    /**
     * The WBRAID Identifier. The web SDK automatically captures this from the query params.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $wbraid;

    /**
     * Whether the user is in a webview. Ex: true.
     */
    #[Api(nullable: true, optional: true)]
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
        ?string $ip = null,
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
        $obj = new self;

        null !== $activeDuration && $obj->activeDuration = $activeDuration;
        null !== $adID && $obj->adID = $adID;
        null !== $adsetID && $obj->adsetID = $adsetID;
        null !== $browserLanguage && $obj->browserLanguage = $browserLanguage;
        null !== $browserName && $obj->browserName = $browserName;
        null !== $browserVersion && $obj->browserVersion = $browserVersion;
        null !== $campaignID && $obj->campaignID = $campaignID;
        null !== $clickid && $obj->clickid = $clickid;
        null !== $clid && $obj->clid = $clid;
        null !== $cpuArchitecture && $obj->cpuArchitecture = $cpuArchitecture;
        null !== $currentURL && $obj->currentURL = $currentURL;
        null !== $dclid && $obj->dclid = $dclid;
        null !== $deviceModel && $obj->deviceModel = $deviceModel;
        null !== $deviceType && $obj->deviceType = $deviceType;
        null !== $deviceVendor && $obj->deviceVendor = $deviceVendor;
        null !== $duration && $obj->duration = $duration;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $engineName && $obj->engineName = $engineName;
        null !== $engineVersion && $obj->engineVersion = $engineVersion;
        null !== $epik && $obj->epik = $epik;
        null !== $fbc && $obj->fbc = $fbc;
        null !== $fbclid && $obj->fbclid = $fbclid;
        null !== $fbp && $obj->fbp = $fbp;
        null !== $fv && $obj->fv = $fv;
        null !== $gadSource && $obj->gadSource = $gadSource;
        null !== $gbraid && $obj->gbraid = $gbraid;
        null !== $gclid && $obj->gclid = $gclid;
        null !== $host && $obj->host = $host;
        null !== $iframe && $obj->iframe = $iframe;
        null !== $ip && $obj->ip = $ip;
        null !== $isBot && $obj->isBot = $isBot;
        null !== $liFatID && $obj->liFatID = $liFatID;
        null !== $msclkid && $obj->msclkid = $msclkid;
        null !== $ndclid && $obj->ndclid = $ndclid;
        null !== $newS && $obj->newS = $newS;
        null !== $osName && $obj->osName = $osName;
        null !== $osVersion && $obj->osVersion = $osVersion;
        null !== $pageHash && $obj->pageHash = $pageHash;
        null !== $pathname && $obj->pathname = $pathname;
        null !== $qclid && $obj->qclid = $qclid;
        null !== $rdtCid && $obj->rdtCid = $rdtCid;
        null !== $receivedAt && $obj->receivedAt = $receivedAt;
        null !== $referrer && $obj->referrer = $referrer;
        null !== $sacid && $obj->sacid = $sacid;
        null !== $sccid && $obj->sccid = $sccid;
        null !== $screenHeight && $obj->screenHeight = $screenHeight;
        null !== $screenWidth && $obj->screenWidth = $screenWidth;
        null !== $sessionCount && $obj->sessionCount = $sessionCount;
        null !== $sid && $obj->sid = $sid;
        null !== $sr && $obj->sr = $sr;
        null !== $title && $obj->title = $title;
        null !== $ttclid && $obj->ttclid = $ttclid;
        null !== $twclid && $obj->twclid = $twclid;
        null !== $uafvl && $obj->uafvl = $uafvl;
        null !== $userAgent && $obj->userAgent = $userAgent;
        null !== $utmCampaign && $obj->utmCampaign = $utmCampaign;
        null !== $utmContent && $obj->utmContent = $utmContent;
        null !== $utmMedium && $obj->utmMedium = $utmMedium;
        null !== $utmName && $obj->utmName = $utmName;
        null !== $utmSource && $obj->utmSource = $utmSource;
        null !== $utmTerm && $obj->utmTerm = $utmTerm;
        null !== $version && $obj->version = $version;
        null !== $wbraid && $obj->wbraid = $wbraid;
        null !== $webview && $obj->webview = $webview;

        return $obj;
    }

    /**
     * The active time in milliseconds that the user had this tab active.
     */
    public function withActiveDuration(?float $activeDuration): self
    {
        $obj = clone $this;
        $obj->activeDuration = $activeDuration;

        return $obj;
    }

    /**
     * The ad id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdID(?string $adID): self
    {
        $obj = clone $this;
        $obj->adID = $adID;

        return $obj;
    }

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdsetID(?string $adsetID): self
    {
        $obj = clone $this;
        $obj->adsetID = $adsetID;

        return $obj;
    }

    /**
     * The language of the browser. Ex: en-US.
     */
    public function withBrowserLanguage(?string $browserLanguage): self
    {
        $obj = clone $this;
        $obj->browserLanguage = $browserLanguage;

        return $obj;
    }

    /**
     * The name of the browser. Ex: Chrome.
     */
    public function withBrowserName(?string $browserName): self
    {
        $obj = clone $this;
        $obj->browserName = $browserName;

        return $obj;
    }

    /**
     * The version of the browser. Ex: 114.0.
     */
    public function withBrowserVersion(?string $browserVersion): self
    {
        $obj = clone $this;
        $obj->browserVersion = $browserVersion;

        return $obj;
    }

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    public function withCampaignID(?string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignID = $campaignID;

        return $obj;
    }

    /**
     * The Click ID. Ex: clickid123.
     */
    public function withClickid(?string $clickid): self
    {
        $obj = clone $this;
        $obj->clickid = $clickid;

        return $obj;
    }

    /**
     * The Generic Click ID. Ex: clid123.
     */
    public function withClid(?string $clid): self
    {
        $obj = clone $this;
        $obj->clid = $clid;

        return $obj;
    }

    /**
     * The architecture of the CPU. Ex: x64.
     */
    public function withCPUArchitecture(?string $cpuArchitecture): self
    {
        $obj = clone $this;
        $obj->cpuArchitecture = $cpuArchitecture;

        return $obj;
    }

    /**
     * The full url (including query params) of the current page.
     */
    public function withCurrentURL(?string $currentURL): self
    {
        $obj = clone $this;
        $obj->currentURL = $currentURL;

        return $obj;
    }

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    public function withDclid(?string $dclid): self
    {
        $obj = clone $this;
        $obj->dclid = $dclid;

        return $obj;
    }

    /**
     * The model of the device. Ex: iPhone 13.
     */
    public function withDeviceModel(?string $deviceModel): self
    {
        $obj = clone $this;
        $obj->deviceModel = $deviceModel;

        return $obj;
    }

    /**
     * The type of device the user is using. Ex: mobile.
     */
    public function withDeviceType(?string $deviceType): self
    {
        $obj = clone $this;
        $obj->deviceType = $deviceType;

        return $obj;
    }

    /**
     * The vendor of the device. Ex: Apple.
     */
    public function withDeviceVendor(?string $deviceVendor): self
    {
        $obj = clone $this;
        $obj->deviceVendor = $deviceVendor;

        return $obj;
    }

    /**
     * The time in milliseconds since the page was loaded // script was loaded.
     */
    public function withDuration(?float $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    /**
     * The browsers encoding. Ex: UTF-8.
     */
    public function withEncoding(?string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    /**
     * The name of the browser engine. Ex: Blink.
     */
    public function withEngineName(?string $engineName): self
    {
        $obj = clone $this;
        $obj->engineName = $engineName;

        return $obj;
    }

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    public function withEngineVersion(?string $engineVersion): self
    {
        $obj = clone $this;
        $obj->engineVersion = $engineVersion;

        return $obj;
    }

    /**
     * The Pinterest Click ID. Ex: epik456.
     */
    public function withEpik(?string $epik): self
    {
        $obj = clone $this;
        $obj->epik = $epik;

        return $obj;
    }

    /**
     * Facebook Click ID with prefix format for Conversions API tracking. Ex: fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbc(?string $fbc): self
    {
        $obj = clone $this;
        $obj->fbc = $fbc;

        return $obj;
    }

    /**
     * Raw Facebook Click ID query parameter without prefix from ad clicks. Ex: AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbclid(?string $fbclid): self
    {
        $obj = clone $this;
        $obj->fbclid = $fbclid;

        return $obj;
    }

    /**
     * Facebook Browser ID parameter for identifying browsers and attributing events. Ex: fb.1.1554763741205.1098115397.
     */
    public function withFbp(?string $fbp): self
    {
        $obj = clone $this;
        $obj->fbp = $fbp;

        return $obj;
    }

    /**
     * Deprecated.
     */
    public function withFv(?bool $fv): self
    {
        $obj = clone $this;
        $obj->fv = $fv;

        return $obj;
    }

    /**
     * The Google Ad Source. Ex: google.
     */
    public function withGadSource(?string $gadSource): self
    {
        $obj = clone $this;
        $obj->gadSource = $gadSource;

        return $obj;
    }

    /**
     * The Google Braid ID. Ex: gbraid123.
     */
    public function withGbraid(?string $gbraid): self
    {
        $obj = clone $this;
        $obj->gbraid = $gbraid;

        return $obj;
    }

    /**
     * The Google Click ID. Ex: gclid123.
     */
    public function withGclid(?string $gclid): self
    {
        $obj = clone $this;
        $obj->gclid = $gclid;

        return $obj;
    }

    /**
     * The host of the current page. Ex: example.com.
     */
    public function withHost(?string $host): self
    {
        $obj = clone $this;
        $obj->host = $host;

        return $obj;
    }

    /**
     * Whether the user is in an iframe. Ex: true.
     */
    public function withIframe(?bool $iframe): self
    {
        $obj = clone $this;
        $obj->iframe = $iframe;

        return $obj;
    }

    /**
     * The IP address of the user. Ex: 127.0.0.1.
     */
    public function withIP(?string $ip): self
    {
        $obj = clone $this;
        $obj->ip = $ip;

        return $obj;
    }

    /**
     * Whether we have detected that the user is a bot. This is set automatically by the Ours server primarily for events tracked through the web SDK.
     */
    public function withIsBot(mixed $isBot): self
    {
        $obj = clone $this;
        $obj->isBot = $isBot;

        return $obj;
    }

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    public function withLiFatID(?string $liFatID): self
    {
        $obj = clone $this;
        $obj->liFatID = $liFatID;

        return $obj;
    }

    /**
     * The Microsoft Click ID. Ex: msclkid123.
     */
    public function withMsclkid(?string $msclkid): self
    {
        $obj = clone $this;
        $obj->msclkid = $msclkid;

        return $obj;
    }

    /**
     * The NextDoor Click ID. Ex: ndclid123.
     */
    public function withNdclid(?string $ndclid): self
    {
        $obj = clone $this;
        $obj->ndclid = $ndclid;

        return $obj;
    }

    /**
     * Deprecated.
     */
    public function withNewS(?bool $newS): self
    {
        $obj = clone $this;
        $obj->newS = $newS;

        return $obj;
    }

    /**
     * The name of the operating system. Ex: Windows.
     */
    public function withOsName(?string $osName): self
    {
        $obj = clone $this;
        $obj->osName = $osName;

        return $obj;
    }

    /**
     * The version of the operating system. Ex: 10.0.
     */
    public function withOsVersion(?string $osVersion): self
    {
        $obj = clone $this;
        $obj->osVersion = $osVersion;

        return $obj;
    }

    /**
     * A random set of numbers for the page load.
     */
    public function withPageHash(?float $pageHash): self
    {
        $obj = clone $this;
        $obj->pageHash = $pageHash;

        return $obj;
    }

    /**
     * The pathname of the current page. Ex: /home.
     */
    public function withPathname(?string $pathname): self
    {
        $obj = clone $this;
        $obj->pathname = $pathname;

        return $obj;
    }

    /**
     * The Quora Click ID. Ex: qclid123.
     */
    public function withQclid(?string $qclid): self
    {
        $obj = clone $this;
        $obj->qclid = $qclid;

        return $obj;
    }

    /**
     * The Reddit Click ID. Ex: rdt_cid123.
     */
    public function withRdtCid(?string $rdtCid): self
    {
        $obj = clone $this;
        $obj->rdtCid = $rdtCid;

        return $obj;
    }

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    public function withReceivedAt(?string $receivedAt): self
    {
        $obj = clone $this;
        $obj->receivedAt = $receivedAt;

        return $obj;
    }

    /**
     * The referrer URL of the current page.
     */
    public function withReferrer(?string $referrer): self
    {
        $obj = clone $this;
        $obj->referrer = $referrer;

        return $obj;
    }

    /**
     * The StackAdapt Tracking ID. Ex: sacid123.
     */
    public function withSacid(?string $sacid): self
    {
        $obj = clone $this;
        $obj->sacid = $sacid;

        return $obj;
    }

    /**
     * The SnapChat Click ID. Ex: sccid123.
     */
    public function withSccid(?string $sccid): self
    {
        $obj = clone $this;
        $obj->sccid = $sccid;

        return $obj;
    }

    /**
     * The height of the screen. Ex: 1080.
     */
    public function withScreenHeight(?float $screenHeight): self
    {
        $obj = clone $this;
        $obj->screenHeight = $screenHeight;

        return $obj;
    }

    /**
     * The width of the screen. Ex: 1920.
     */
    public function withScreenWidth(?float $screenWidth): self
    {
        $obj = clone $this;
        $obj->screenWidth = $screenWidth;

        return $obj;
    }

    /**
     * The number of sessions the user has had. Ex: 3.
     */
    public function withSessionCount(?float $sessionCount): self
    {
        $obj = clone $this;
        $obj->sessionCount = $sessionCount;

        return $obj;
    }

    /**
     * The session ID as assigned automatically by the web SDK. This is required for session replay.
     */
    public function withSid(?string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

        return $obj;
    }

    public function withSr(?string $sr): self
    {
        $obj = clone $this;
        $obj->sr = $sr;

        return $obj;
    }

    /**
     * The title of the current page.
     */
    public function withTitle(?string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * The TikTok Click ID. Ex: ttclid123.
     */
    public function withTtclid(?string $ttclid): self
    {
        $obj = clone $this;
        $obj->ttclid = $ttclid;

        return $obj;
    }

    /**
     * The Twitter Click ID. Ex: twclid123.
     */
    public function withTwclid(?string $twclid): self
    {
        $obj = clone $this;
        $obj->twclid = $twclid;

        return $obj;
    }

    /**
     * User agent as a full list of strings.
     */
    public function withUafvl(?string $uafvl): self
    {
        $obj = clone $this;
        $obj->uafvl = $uafvl;

        return $obj;
    }

    /**
     * The user agent of the browser.
     */
    public function withUserAgent(?string $userAgent): self
    {
        $obj = clone $this;
        $obj->userAgent = $userAgent;

        return $obj;
    }

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    public function withUtmCampaign(?string $utmCampaign): self
    {
        $obj = clone $this;
        $obj->utmCampaign = $utmCampaign;

        return $obj;
    }

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    public function withUtmContent(?string $utmContent): self
    {
        $obj = clone $this;
        $obj->utmContent = $utmContent;

        return $obj;
    }

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    public function withUtmMedium(?string $utmMedium): self
    {
        $obj = clone $this;
        $obj->utmMedium = $utmMedium;

        return $obj;
    }

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    public function withUtmName(?string $utmName): self
    {
        $obj = clone $this;
        $obj->utmName = $utmName;

        return $obj;
    }

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    public function withUtmSource(?string $utmSource): self
    {
        $obj = clone $this;
        $obj->utmSource = $utmSource;

        return $obj;
    }

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    public function withUtmTerm(?string $utmTerm): self
    {
        $obj = clone $this;
        $obj->utmTerm = $utmTerm;

        return $obj;
    }

    /**
     * The version of the web SDK.
     */
    public function withVersion(?string $version): self
    {
        $obj = clone $this;
        $obj->version = $version;

        return $obj;
    }

    /**
     * The WBRAID Identifier. The web SDK automatically captures this from the query params.
     */
    public function withWbraid(?string $wbraid): self
    {
        $obj = clone $this;
        $obj->wbraid = $wbraid;

        return $obj;
    }

    /**
     * Whether the user is in a webview. Ex: true.
     */
    public function withWebview(?bool $webview): self
    {
        $obj = clone $this;
        $obj->webview = $webview;

        return $obj;
    }
}
