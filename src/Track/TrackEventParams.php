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
 *     ad_id?: string|null,
 *     adset_id?: string|null,
 *     browser_language?: string|null,
 *     browser_name?: string|null,
 *     browser_version?: string|null,
 *     campaign_id?: string|null,
 *     clickid?: string|null,
 *     clid?: string|null,
 *     cpu_architecture?: string|null,
 *     current_url?: string|null,
 *     dclid?: string|null,
 *     device_model?: string|null,
 *     device_type?: string|null,
 *     device_vendor?: string|null,
 *     duration?: float|null,
 *     encoding?: string|null,
 *     engine_name?: string|null,
 *     engine_version?: string|null,
 *     epik?: string|null,
 *     fbc?: string|null,
 *     fbclid?: string|null,
 *     fbp?: string|null,
 *     fv?: bool|null,
 *     gad_source?: string|null,
 *     gbraid?: string|null,
 *     gclid?: string|null,
 *     host?: string|null,
 *     iframe?: bool|null,
 *     ip?: string|null,
 *     irclickid?: string|null,
 *     is_bot?: mixed,
 *     li_fat_id?: string|null,
 *     msclkid?: string|null,
 *     ndclid?: string|null,
 *     new_s?: bool|null,
 *     os_name?: string|null,
 *     os_version?: string|null,
 *     page_hash?: float|null,
 *     pathname?: string|null,
 *     qclid?: string|null,
 *     rdt_cid?: string|null,
 *     received_at?: string|null,
 *     referrer?: string|null,
 *     referring_domain?: string|null,
 *     sacid?: string|null,
 *     sccid?: string|null,
 *     screen_height?: float|null,
 *     screen_width?: float|null,
 *     sessionCount?: float|null,
 *     sid?: string|null,
 *     sr?: string|null,
 *     title?: string|null,
 *     ttclid?: string|null,
 *     twclid?: string|null,
 *     uafvl?: string|null,
 *     user_agent?: string|null,
 *     utm_campaign?: string|null,
 *     utm_content?: string|null,
 *     utm_medium?: string|null,
 *     utm_name?: string|null,
 *     utm_source?: string|null,
 *     utm_term?: string|null,
 *     version?: string|null,
 *     wbraid?: string|null,
 *     webview?: bool|null,
 *   },
 *   distinctId?: string|null,
 *   email?: string|null,
 *   eventProperties?: array<string,mixed>|null,
 *   externalId?: string|null,
 *   time?: float|null,
 *   userId?: string|null,
 *   userProperties?: null|UserProperties|array{
 *     ad_id?: string|null,
 *     adset_id?: string|null,
 *     campaign_id?: string|null,
 *     city?: string|null,
 *     clickid?: string|null,
 *     clid?: string|null,
 *     company_name?: string|null,
 *     consent?: array<string,mixed>|null,
 *     country?: string|null,
 *     custom_properties?: array<string,mixed>|null,
 *     date_of_birth?: string|null,
 *     dclid?: string|null,
 *     email?: string|null,
 *     epik?: string|null,
 *     external_id?: string|null,
 *     fbc?: string|null,
 *     fbclid?: string|null,
 *     fbp?: string|null,
 *     first_name?: string|null,
 *     gad_source?: string|null,
 *     gbraid?: string|null,
 *     gclid?: string|null,
 *     gender?: string|null,
 *     ip?: string|null,
 *     irclickid?: string|null,
 *     is_bot?: mixed,
 *     job_title?: string|null,
 *     last_name?: string|null,
 *     li_fat_id?: string|null,
 *     msclkid?: string|null,
 *     ndclid?: string|null,
 *     phone_number?: mixed,
 *     qclid?: string|null,
 *     rdt_cid?: string|null,
 *     referrer?: string|null,
 *     referring_domain?: string|null,
 *     sacid?: string|null,
 *     sccid?: string|null,
 *     sid?: string|null,
 *     state?: string|null,
 *     ttclid?: string|null,
 *     twclid?: string|null,
 *     user_agent?: string|null,
 *     user_agent_full_list?: string|null,
 *     utm_campaign?: string|null,
 *     utm_content?: string|null,
 *     utm_medium?: string|null,
 *     utm_name?: string|null,
 *     utm_source?: string|null,
 *     utm_term?: string|null,
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
    #[Optional(nullable: true)]
    public ?string $distinctId;

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
    #[Optional(nullable: true)]
    public ?string $externalId;

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    #[Optional(nullable: true)]
    public ?float $time;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Optional(nullable: true)]
    public ?string $userId;

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
     * }|null $defaultProperties
     * @param array<string,mixed>|null $eventProperties
     * @param UserProperties|array{
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
     * }|null $userProperties
     */
    public static function with(
        string $token,
        string $event,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $distinctId = null,
        ?string $email = null,
        ?array $eventProperties = null,
        ?string $externalId = null,
        ?float $time = null,
        ?string $userId = null,
        UserProperties|array|null $userProperties = null,
    ): self {
        $obj = new self;

        $obj['token'] = $token;
        $obj['event'] = $event;

        null !== $defaultProperties && $obj['defaultProperties'] = $defaultProperties;
        null !== $distinctId && $obj['distinctId'] = $distinctId;
        null !== $email && $obj['email'] = $email;
        null !== $eventProperties && $obj['eventProperties'] = $eventProperties;
        null !== $externalId && $obj['externalId'] = $externalId;
        null !== $time && $obj['time'] = $time;
        null !== $userId && $obj['userId'] = $userId;
        null !== $userProperties && $obj['userProperties'] = $userProperties;

        return $obj;
    }

    /**
     * The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    /**
     * The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     */
    public function withEvent(string $event): self
    {
        $obj = clone $this;
        $obj['event'] = $event;

        return $obj;
    }

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     *
     * @param DefaultProperties|array{
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
     * }|null $defaultProperties
     */
    public function withDefaultProperties(
        DefaultProperties|array|null $defaultProperties
    ): self {
        $obj = clone $this;
        $obj['defaultProperties'] = $defaultProperties;

        return $obj;
    }

    /**
     * A unique identifier for the event. This helps prevent duplicate events.
     */
    public function withDistinctID(?string $distinctID): self
    {
        $obj = clone $this;
        $obj['distinctId'] = $distinctID;

        return $obj;
    }

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Any additional event properties you want to pass along.
     *
     * @param array<string,mixed>|null $eventProperties
     */
    public function withEventProperties(?array $eventProperties): self
    {
        $obj = clone $this;
        $obj['eventProperties'] = $eventProperties;

        return $obj;
    }

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj['externalId'] = $externalID;

        return $obj;
    }

    /**
     * The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     */
    public function withTime(?float $time): self
    {
        $obj = clone $this;
        $obj['time'] = $time;

        return $obj;
    }

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    /**
     * Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     *
     * @param UserProperties|array{
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
     * }|null $userProperties
     */
    public function withUserProperties(
        UserProperties|array|null $userProperties
    ): self {
        $obj = clone $this;
        $obj['userProperties'] = $userProperties;

        return $obj;
    }
}
