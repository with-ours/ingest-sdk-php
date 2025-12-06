<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor;

use OursPrivacy\Core\Attributes\Api;
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
 *   email?: string|null,
 *   externalId?: string|null,
 *   userId?: string|null,
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
    #[Api]
    public string $token;

    /**
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     */
    #[Api]
    public UserProperties $userProperties;

    /**
     * These properties are used throughout the Ours app to pass known values onto destinations.
     */
    #[Api(nullable: true, optional: true)]
    public ?DefaultProperties $defaultProperties;

    /**
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $email;

    /**
     * The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $externalId;

    /**
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $userId;

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
     * } $userProperties
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
    public static function with(
        string $token,
        UserProperties|array $userProperties,
        DefaultProperties|array|null $defaultProperties = null,
        ?string $email = null,
        ?string $externalId = null,
        ?string $userId = null,
    ): self {
        $obj = new self;

        $obj['token'] = $token;
        $obj['userProperties'] = $userProperties;

        null !== $defaultProperties && $obj['defaultProperties'] = $defaultProperties;
        null !== $email && $obj['email'] = $email;
        null !== $externalId && $obj['externalId'] = $externalId;
        null !== $userId && $obj['userId'] = $userId;

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
     * User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
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
     * } $userProperties
     */
    public function withUserProperties(
        UserProperties|array $userProperties
    ): self {
        $obj = clone $this;
        $obj['userProperties'] = $userProperties;

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
     * The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

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
     * The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }
}
