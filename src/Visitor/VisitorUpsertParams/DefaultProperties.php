<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor\VisitorUpsertParams;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;

/**
 * These properties are used throughout the Ours app to pass known values onto destinations.
 *
 * @phpstan-type DefaultPropertiesShape = array{
 *   activeDuration?: float|null,
 *   ad_id?: string|null,
 *   adset_id?: string|null,
 *   browser_language?: string|null,
 *   browser_name?: string|null,
 *   browser_version?: string|null,
 *   campaign_id?: string|null,
 *   clickid?: string|null,
 *   clid?: string|null,
 *   cpu_architecture?: string|null,
 *   current_url?: string|null,
 *   dclid?: string|null,
 *   device_model?: string|null,
 *   device_type?: string|null,
 *   device_vendor?: string|null,
 *   duration?: float|null,
 *   encoding?: string|null,
 *   engine_name?: string|null,
 *   engine_version?: string|null,
 *   epik?: string|null,
 *   fbc?: string|null,
 *   fbclid?: string|null,
 *   fbp?: string|null,
 *   fv?: bool|null,
 *   gad_source?: string|null,
 *   gbraid?: string|null,
 *   gclid?: string|null,
 *   host?: string|null,
 *   iframe?: bool|null,
 *   ip?: string|null,
 *   irclickid?: string|null,
 *   is_bot?: mixed,
 *   li_fat_id?: string|null,
 *   msclkid?: string|null,
 *   ndclid?: string|null,
 *   new_s?: bool|null,
 *   os_name?: string|null,
 *   os_version?: string|null,
 *   page_hash?: float|null,
 *   pathname?: string|null,
 *   qclid?: string|null,
 *   rdt_cid?: string|null,
 *   received_at?: string|null,
 *   referrer?: string|null,
 *   referring_domain?: string|null,
 *   sacid?: string|null,
 *   sccid?: string|null,
 *   screen_height?: float|null,
 *   screen_width?: float|null,
 *   sessionCount?: float|null,
 *   sid?: string|null,
 *   sr?: string|null,
 *   title?: string|null,
 *   ttclid?: string|null,
 *   twclid?: string|null,
 *   uafvl?: string|null,
 *   user_agent?: string|null,
 *   utm_campaign?: string|null,
 *   utm_content?: string|null,
 *   utm_medium?: string|null,
 *   utm_name?: string|null,
 *   utm_source?: string|null,
 *   utm_term?: string|null,
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
    #[Optional(nullable: true)]
    public ?string $ad_id;

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    #[Optional(nullable: true)]
    public ?string $adset_id;

    /**
     * The language of the browser. Ex: en-US.
     */
    #[Optional(nullable: true)]
    public ?string $browser_language;

    /**
     * The name of the browser. Ex: Chrome.
     */
    #[Optional(nullable: true)]
    public ?string $browser_name;

    /**
     * The version of the browser. Ex: 114.0.
     */
    #[Optional(nullable: true)]
    public ?string $browser_version;

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    #[Optional(nullable: true)]
    public ?string $campaign_id;

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
    #[Optional(nullable: true)]
    public ?string $cpu_architecture;

    /**
     * The full url (including query params) of the current page.
     */
    #[Optional(nullable: true)]
    public ?string $current_url;

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    #[Optional(nullable: true)]
    public ?string $dclid;

    /**
     * The model of the device. Ex: iPhone 13.
     */
    #[Optional(nullable: true)]
    public ?string $device_model;

    /**
     * The type of device the user is using. Ex: mobile.
     */
    #[Optional(nullable: true)]
    public ?string $device_type;

    /**
     * The vendor of the device. Ex: Apple.
     */
    #[Optional(nullable: true)]
    public ?string $device_vendor;

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
    #[Optional(nullable: true)]
    public ?string $engine_name;

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    #[Optional(nullable: true)]
    public ?string $engine_version;

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
    #[Optional(nullable: true)]
    public ?string $gad_source;

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
    #[Optional]
    public mixed $is_bot;

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    #[Optional(nullable: true)]
    public ?string $li_fat_id;

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
    #[Optional(nullable: true)]
    public ?bool $new_s;

    /**
     * The name of the operating system. Ex: Windows.
     */
    #[Optional(nullable: true)]
    public ?string $os_name;

    /**
     * The version of the operating system. Ex: 10.0.
     */
    #[Optional(nullable: true)]
    public ?string $os_version;

    /**
     * A random set of numbers for the page load.
     */
    #[Optional(nullable: true)]
    public ?float $page_hash;

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
    #[Optional(nullable: true)]
    public ?string $rdt_cid;

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    #[Optional(nullable: true)]
    public ?string $received_at;

    /**
     * The referrer URL of the current page.
     */
    #[Optional(nullable: true)]
    public ?string $referrer;

    /**
     * The referring domain of the current page.
     */
    #[Optional(nullable: true)]
    public ?string $referring_domain;

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
    #[Optional(nullable: true)]
    public ?float $screen_height;

    /**
     * The width of the screen. Ex: 1920.
     */
    #[Optional(nullable: true)]
    public ?float $screen_width;

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
    #[Optional(nullable: true)]
    public ?string $user_agent;

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_campaign;

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_content;

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_medium;

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_name;

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_source;

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    #[Optional(nullable: true)]
    public ?string $utm_term;

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
        ?string $ad_id = null,
        ?string $adset_id = null,
        ?string $browser_language = null,
        ?string $browser_name = null,
        ?string $browser_version = null,
        ?string $campaign_id = null,
        ?string $clickid = null,
        ?string $clid = null,
        ?string $cpu_architecture = null,
        ?string $current_url = null,
        ?string $dclid = null,
        ?string $device_model = null,
        ?string $device_type = null,
        ?string $device_vendor = null,
        ?float $duration = null,
        ?string $encoding = null,
        ?string $engine_name = null,
        ?string $engine_version = null,
        ?string $epik = null,
        ?string $fbc = null,
        ?string $fbclid = null,
        ?string $fbp = null,
        ?bool $fv = null,
        ?string $gad_source = null,
        ?string $gbraid = null,
        ?string $gclid = null,
        ?string $host = null,
        ?bool $iframe = null,
        ?string $ip = null,
        ?string $irclickid = null,
        mixed $is_bot = null,
        ?string $li_fat_id = null,
        ?string $msclkid = null,
        ?string $ndclid = null,
        ?bool $new_s = null,
        ?string $os_name = null,
        ?string $os_version = null,
        ?float $page_hash = null,
        ?string $pathname = null,
        ?string $qclid = null,
        ?string $rdt_cid = null,
        ?string $received_at = null,
        ?string $referrer = null,
        ?string $referring_domain = null,
        ?string $sacid = null,
        ?string $sccid = null,
        ?float $screen_height = null,
        ?float $screen_width = null,
        ?float $sessionCount = null,
        ?string $sid = null,
        ?string $sr = null,
        ?string $title = null,
        ?string $ttclid = null,
        ?string $twclid = null,
        ?string $uafvl = null,
        ?string $user_agent = null,
        ?string $utm_campaign = null,
        ?string $utm_content = null,
        ?string $utm_medium = null,
        ?string $utm_name = null,
        ?string $utm_source = null,
        ?string $utm_term = null,
        ?string $version = null,
        ?string $wbraid = null,
        ?bool $webview = null,
    ): self {
        $obj = new self;

        null !== $activeDuration && $obj['activeDuration'] = $activeDuration;
        null !== $ad_id && $obj['ad_id'] = $ad_id;
        null !== $adset_id && $obj['adset_id'] = $adset_id;
        null !== $browser_language && $obj['browser_language'] = $browser_language;
        null !== $browser_name && $obj['browser_name'] = $browser_name;
        null !== $browser_version && $obj['browser_version'] = $browser_version;
        null !== $campaign_id && $obj['campaign_id'] = $campaign_id;
        null !== $clickid && $obj['clickid'] = $clickid;
        null !== $clid && $obj['clid'] = $clid;
        null !== $cpu_architecture && $obj['cpu_architecture'] = $cpu_architecture;
        null !== $current_url && $obj['current_url'] = $current_url;
        null !== $dclid && $obj['dclid'] = $dclid;
        null !== $device_model && $obj['device_model'] = $device_model;
        null !== $device_type && $obj['device_type'] = $device_type;
        null !== $device_vendor && $obj['device_vendor'] = $device_vendor;
        null !== $duration && $obj['duration'] = $duration;
        null !== $encoding && $obj['encoding'] = $encoding;
        null !== $engine_name && $obj['engine_name'] = $engine_name;
        null !== $engine_version && $obj['engine_version'] = $engine_version;
        null !== $epik && $obj['epik'] = $epik;
        null !== $fbc && $obj['fbc'] = $fbc;
        null !== $fbclid && $obj['fbclid'] = $fbclid;
        null !== $fbp && $obj['fbp'] = $fbp;
        null !== $fv && $obj['fv'] = $fv;
        null !== $gad_source && $obj['gad_source'] = $gad_source;
        null !== $gbraid && $obj['gbraid'] = $gbraid;
        null !== $gclid && $obj['gclid'] = $gclid;
        null !== $host && $obj['host'] = $host;
        null !== $iframe && $obj['iframe'] = $iframe;
        null !== $ip && $obj['ip'] = $ip;
        null !== $irclickid && $obj['irclickid'] = $irclickid;
        null !== $is_bot && $obj['is_bot'] = $is_bot;
        null !== $li_fat_id && $obj['li_fat_id'] = $li_fat_id;
        null !== $msclkid && $obj['msclkid'] = $msclkid;
        null !== $ndclid && $obj['ndclid'] = $ndclid;
        null !== $new_s && $obj['new_s'] = $new_s;
        null !== $os_name && $obj['os_name'] = $os_name;
        null !== $os_version && $obj['os_version'] = $os_version;
        null !== $page_hash && $obj['page_hash'] = $page_hash;
        null !== $pathname && $obj['pathname'] = $pathname;
        null !== $qclid && $obj['qclid'] = $qclid;
        null !== $rdt_cid && $obj['rdt_cid'] = $rdt_cid;
        null !== $received_at && $obj['received_at'] = $received_at;
        null !== $referrer && $obj['referrer'] = $referrer;
        null !== $referring_domain && $obj['referring_domain'] = $referring_domain;
        null !== $sacid && $obj['sacid'] = $sacid;
        null !== $sccid && $obj['sccid'] = $sccid;
        null !== $screen_height && $obj['screen_height'] = $screen_height;
        null !== $screen_width && $obj['screen_width'] = $screen_width;
        null !== $sessionCount && $obj['sessionCount'] = $sessionCount;
        null !== $sid && $obj['sid'] = $sid;
        null !== $sr && $obj['sr'] = $sr;
        null !== $title && $obj['title'] = $title;
        null !== $ttclid && $obj['ttclid'] = $ttclid;
        null !== $twclid && $obj['twclid'] = $twclid;
        null !== $uafvl && $obj['uafvl'] = $uafvl;
        null !== $user_agent && $obj['user_agent'] = $user_agent;
        null !== $utm_campaign && $obj['utm_campaign'] = $utm_campaign;
        null !== $utm_content && $obj['utm_content'] = $utm_content;
        null !== $utm_medium && $obj['utm_medium'] = $utm_medium;
        null !== $utm_name && $obj['utm_name'] = $utm_name;
        null !== $utm_source && $obj['utm_source'] = $utm_source;
        null !== $utm_term && $obj['utm_term'] = $utm_term;
        null !== $version && $obj['version'] = $version;
        null !== $wbraid && $obj['wbraid'] = $wbraid;
        null !== $webview && $obj['webview'] = $webview;

        return $obj;
    }

    /**
     * The active time in milliseconds that the user had this tab active.
     */
    public function withActiveDuration(?float $activeDuration): self
    {
        $obj = clone $this;
        $obj['activeDuration'] = $activeDuration;

        return $obj;
    }

    /**
     * The ad id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdID(?string $adID): self
    {
        $obj = clone $this;
        $obj['ad_id'] = $adID;

        return $obj;
    }

    /**
     * The adset id for detected in the session. This is set by the web sdk automatically.
     */
    public function withAdsetID(?string $adsetID): self
    {
        $obj = clone $this;
        $obj['adset_id'] = $adsetID;

        return $obj;
    }

    /**
     * The language of the browser. Ex: en-US.
     */
    public function withBrowserLanguage(?string $browserLanguage): self
    {
        $obj = clone $this;
        $obj['browser_language'] = $browserLanguage;

        return $obj;
    }

    /**
     * The name of the browser. Ex: Chrome.
     */
    public function withBrowserName(?string $browserName): self
    {
        $obj = clone $this;
        $obj['browser_name'] = $browserName;

        return $obj;
    }

    /**
     * The version of the browser. Ex: 114.0.
     */
    public function withBrowserVersion(?string $browserVersion): self
    {
        $obj = clone $this;
        $obj['browser_version'] = $browserVersion;

        return $obj;
    }

    /**
     * The campaign id for detected in the session. This is set by the web sdk automatically.
     */
    public function withCampaignID(?string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaign_id'] = $campaignID;

        return $obj;
    }

    /**
     * The Click ID. Ex: clickid123.
     */
    public function withClickid(?string $clickid): self
    {
        $obj = clone $this;
        $obj['clickid'] = $clickid;

        return $obj;
    }

    /**
     * The Generic Click ID. Ex: clid123.
     */
    public function withClid(?string $clid): self
    {
        $obj = clone $this;
        $obj['clid'] = $clid;

        return $obj;
    }

    /**
     * The architecture of the CPU. Ex: x64.
     */
    public function withCPUArchitecture(?string $cpuArchitecture): self
    {
        $obj = clone $this;
        $obj['cpu_architecture'] = $cpuArchitecture;

        return $obj;
    }

    /**
     * The full url (including query params) of the current page.
     */
    public function withCurrentURL(?string $currentURL): self
    {
        $obj = clone $this;
        $obj['current_url'] = $currentURL;

        return $obj;
    }

    /**
     * The DoubleClick Click ID. Ex: dclid123.
     */
    public function withDclid(?string $dclid): self
    {
        $obj = clone $this;
        $obj['dclid'] = $dclid;

        return $obj;
    }

    /**
     * The model of the device. Ex: iPhone 13.
     */
    public function withDeviceModel(?string $deviceModel): self
    {
        $obj = clone $this;
        $obj['device_model'] = $deviceModel;

        return $obj;
    }

    /**
     * The type of device the user is using. Ex: mobile.
     */
    public function withDeviceType(?string $deviceType): self
    {
        $obj = clone $this;
        $obj['device_type'] = $deviceType;

        return $obj;
    }

    /**
     * The vendor of the device. Ex: Apple.
     */
    public function withDeviceVendor(?string $deviceVendor): self
    {
        $obj = clone $this;
        $obj['device_vendor'] = $deviceVendor;

        return $obj;
    }

    /**
     * The time in milliseconds since the page was loaded // script was loaded.
     */
    public function withDuration(?float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * The browsers encoding. Ex: UTF-8.
     */
    public function withEncoding(?string $encoding): self
    {
        $obj = clone $this;
        $obj['encoding'] = $encoding;

        return $obj;
    }

    /**
     * The name of the browser engine. Ex: Blink.
     */
    public function withEngineName(?string $engineName): self
    {
        $obj = clone $this;
        $obj['engine_name'] = $engineName;

        return $obj;
    }

    /**
     * The version of the browser engine. Ex: 114.0.
     */
    public function withEngineVersion(?string $engineVersion): self
    {
        $obj = clone $this;
        $obj['engine_version'] = $engineVersion;

        return $obj;
    }

    /**
     * The Pinterest Click ID. Ex: epik456.
     */
    public function withEpik(?string $epik): self
    {
        $obj = clone $this;
        $obj['epik'] = $epik;

        return $obj;
    }

    /**
     * Facebook Click ID with prefix format for Conversions API tracking. Ex: fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbc(?string $fbc): self
    {
        $obj = clone $this;
        $obj['fbc'] = $fbc;

        return $obj;
    }

    /**
     * Raw Facebook Click ID query parameter without prefix from ad clicks. Ex: AbCdEfGhIjKlMnOpQrStUvWxYz1234567890.
     */
    public function withFbclid(?string $fbclid): self
    {
        $obj = clone $this;
        $obj['fbclid'] = $fbclid;

        return $obj;
    }

    /**
     * Facebook Browser ID parameter for identifying browsers and attributing events. Ex: fb.1.1554763741205.1098115397.
     */
    public function withFbp(?string $fbp): self
    {
        $obj = clone $this;
        $obj['fbp'] = $fbp;

        return $obj;
    }

    /**
     * Deprecated.
     */
    public function withFv(?bool $fv): self
    {
        $obj = clone $this;
        $obj['fv'] = $fv;

        return $obj;
    }

    /**
     * The Google Ad Source. Ex: google.
     */
    public function withGadSource(?string $gadSource): self
    {
        $obj = clone $this;
        $obj['gad_source'] = $gadSource;

        return $obj;
    }

    /**
     * The Google Braid ID. Ex: gbraid123.
     */
    public function withGbraid(?string $gbraid): self
    {
        $obj = clone $this;
        $obj['gbraid'] = $gbraid;

        return $obj;
    }

    /**
     * The Google Click ID. Ex: gclid123.
     */
    public function withGclid(?string $gclid): self
    {
        $obj = clone $this;
        $obj['gclid'] = $gclid;

        return $obj;
    }

    /**
     * The host of the current page. Ex: example.com.
     */
    public function withHost(?string $host): self
    {
        $obj = clone $this;
        $obj['host'] = $host;

        return $obj;
    }

    /**
     * Whether the user is in an iframe. Ex: true.
     */
    public function withIframe(?bool $iframe): self
    {
        $obj = clone $this;
        $obj['iframe'] = $iframe;

        return $obj;
    }

    /**
     * The IP address of the user. Ex: 127.0.0.1.
     */
    public function withIP(?string $ip): self
    {
        $obj = clone $this;
        $obj['ip'] = $ip;

        return $obj;
    }

    /**
     * The Impact Click ID. Ex: irclickid123.
     */
    public function withIrclickid(?string $irclickid): self
    {
        $obj = clone $this;
        $obj['irclickid'] = $irclickid;

        return $obj;
    }

    /**
     * Whether we have detected that the user is a bot. This is set automatically by the Ours server primarily for events tracked through the web SDK.
     */
    public function withIsBot(mixed $isBot): self
    {
        $obj = clone $this;
        $obj['is_bot'] = $isBot;

        return $obj;
    }

    /**
     * The LinkedIn Click ID. Ex: li_fat_id123.
     */
    public function withLiFatID(?string $liFatID): self
    {
        $obj = clone $this;
        $obj['li_fat_id'] = $liFatID;

        return $obj;
    }

    /**
     * The Microsoft Click ID. Ex: msclkid123.
     */
    public function withMsclkid(?string $msclkid): self
    {
        $obj = clone $this;
        $obj['msclkid'] = $msclkid;

        return $obj;
    }

    /**
     * The NextDoor Click ID. Ex: ndclid123.
     */
    public function withNdclid(?string $ndclid): self
    {
        $obj = clone $this;
        $obj['ndclid'] = $ndclid;

        return $obj;
    }

    /**
     * Deprecated.
     */
    public function withNewS(?bool $newS): self
    {
        $obj = clone $this;
        $obj['new_s'] = $newS;

        return $obj;
    }

    /**
     * The name of the operating system. Ex: Windows.
     */
    public function withOsName(?string $osName): self
    {
        $obj = clone $this;
        $obj['os_name'] = $osName;

        return $obj;
    }

    /**
     * The version of the operating system. Ex: 10.0.
     */
    public function withOsVersion(?string $osVersion): self
    {
        $obj = clone $this;
        $obj['os_version'] = $osVersion;

        return $obj;
    }

    /**
     * A random set of numbers for the page load.
     */
    public function withPageHash(?float $pageHash): self
    {
        $obj = clone $this;
        $obj['page_hash'] = $pageHash;

        return $obj;
    }

    /**
     * The pathname of the current page. Ex: /home.
     */
    public function withPathname(?string $pathname): self
    {
        $obj = clone $this;
        $obj['pathname'] = $pathname;

        return $obj;
    }

    /**
     * The Quora Click ID. Ex: qclid123.
     */
    public function withQclid(?string $qclid): self
    {
        $obj = clone $this;
        $obj['qclid'] = $qclid;

        return $obj;
    }

    /**
     * The Reddit Click ID. Ex: rdt_cid123.
     */
    public function withRdtCid(?string $rdtCid): self
    {
        $obj = clone $this;
        $obj['rdt_cid'] = $rdtCid;

        return $obj;
    }

    /**
     * The time the event was received by an Ours server in ISO format.
     */
    public function withReceivedAt(?string $receivedAt): self
    {
        $obj = clone $this;
        $obj['received_at'] = $receivedAt;

        return $obj;
    }

    /**
     * The referrer URL of the current page.
     */
    public function withReferrer(?string $referrer): self
    {
        $obj = clone $this;
        $obj['referrer'] = $referrer;

        return $obj;
    }

    /**
     * The referring domain of the current page.
     */
    public function withReferringDomain(?string $referringDomain): self
    {
        $obj = clone $this;
        $obj['referring_domain'] = $referringDomain;

        return $obj;
    }

    /**
     * The StackAdapt Tracking ID. Ex: sacid123.
     */
    public function withSacid(?string $sacid): self
    {
        $obj = clone $this;
        $obj['sacid'] = $sacid;

        return $obj;
    }

    /**
     * The SnapChat Click ID. Ex: sccid123.
     */
    public function withSccid(?string $sccid): self
    {
        $obj = clone $this;
        $obj['sccid'] = $sccid;

        return $obj;
    }

    /**
     * The height of the screen. Ex: 1080.
     */
    public function withScreenHeight(?float $screenHeight): self
    {
        $obj = clone $this;
        $obj['screen_height'] = $screenHeight;

        return $obj;
    }

    /**
     * The width of the screen. Ex: 1920.
     */
    public function withScreenWidth(?float $screenWidth): self
    {
        $obj = clone $this;
        $obj['screen_width'] = $screenWidth;

        return $obj;
    }

    /**
     * The number of sessions the user has had. Ex: 3.
     */
    public function withSessionCount(?float $sessionCount): self
    {
        $obj = clone $this;
        $obj['sessionCount'] = $sessionCount;

        return $obj;
    }

    /**
     * The session ID as assigned automatically by the web SDK. This is required for session replay.
     */
    public function withSid(?string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    public function withSr(?string $sr): self
    {
        $obj = clone $this;
        $obj['sr'] = $sr;

        return $obj;
    }

    /**
     * The title of the current page.
     */
    public function withTitle(?string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    /**
     * The TikTok Click ID. Ex: ttclid123.
     */
    public function withTtclid(?string $ttclid): self
    {
        $obj = clone $this;
        $obj['ttclid'] = $ttclid;

        return $obj;
    }

    /**
     * The Twitter Click ID. Ex: twclid123.
     */
    public function withTwclid(?string $twclid): self
    {
        $obj = clone $this;
        $obj['twclid'] = $twclid;

        return $obj;
    }

    /**
     * User agent as a full list of strings.
     */
    public function withUafvl(?string $uafvl): self
    {
        $obj = clone $this;
        $obj['uafvl'] = $uafvl;

        return $obj;
    }

    /**
     * The user agent of the browser.
     */
    public function withUserAgent(?string $userAgent): self
    {
        $obj = clone $this;
        $obj['user_agent'] = $userAgent;

        return $obj;
    }

    /**
     * The UTM Campaign. The web SDK automatically captures this from the query params.
     */
    public function withUtmCampaign(?string $utmCampaign): self
    {
        $obj = clone $this;
        $obj['utm_campaign'] = $utmCampaign;

        return $obj;
    }

    /**
     * The UTM Content. The web SDK automatically captures this from the query params.
     */
    public function withUtmContent(?string $utmContent): self
    {
        $obj = clone $this;
        $obj['utm_content'] = $utmContent;

        return $obj;
    }

    /**
     * The UTM Medium. The web SDK automatically captures this from the query params.
     */
    public function withUtmMedium(?string $utmMedium): self
    {
        $obj = clone $this;
        $obj['utm_medium'] = $utmMedium;

        return $obj;
    }

    /**
     * The UTM Name. The web SDK automatically captures this from the query params.
     */
    public function withUtmName(?string $utmName): self
    {
        $obj = clone $this;
        $obj['utm_name'] = $utmName;

        return $obj;
    }

    /**
     * The UTM Source. The web SDK automatically captures this from the query params.
     */
    public function withUtmSource(?string $utmSource): self
    {
        $obj = clone $this;
        $obj['utm_source'] = $utmSource;

        return $obj;
    }

    /**
     * The UTM Term. The web SDK automatically captures this from the query params.
     */
    public function withUtmTerm(?string $utmTerm): self
    {
        $obj = clone $this;
        $obj['utm_term'] = $utmTerm;

        return $obj;
    }

    /**
     * The version of the web SDK.
     */
    public function withVersion(?string $version): self
    {
        $obj = clone $this;
        $obj['version'] = $version;

        return $obj;
    }

    /**
     * The WBRAID Identifier. The web SDK automatically captures this from the query params.
     */
    public function withWbraid(?string $wbraid): self
    {
        $obj = clone $this;
        $obj['wbraid'] = $wbraid;

        return $obj;
    }

    /**
     * Whether the user is in a webview. Ex: true.
     */
    public function withWebview(?bool $webview): self
    {
        $obj = clone $this;
        $obj['webview'] = $webview;

        return $obj;
    }
}
