<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackContract;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventResponse;

final class TrackService implements TrackContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
     *
     * @param array{
     *   token: string,
     *   event: string,
     *   defaultProperties?: array{
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
     *   }|null,
     *   distinctId?: string|null,
     *   email?: string|null,
     *   eventProperties?: array<string,mixed>|null,
     *   externalId?: string|null,
     *   time?: float|null,
     *   userId?: string|null,
     *   userProperties?: array{
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
     *   }|null,
     * }|TrackEventParams $params
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        ?RequestOptions $requestOptions = null
    ): TrackEventResponse {
        [$parsed, $options] = TrackEventParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'track' : 'https://api.oursprivacy.com/api/v1/track';

        /** @var BaseResponse<TrackEventResponse> */
        $response = $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: TrackEventResponse::class,
        );

        return $response->parse();
    }
}
