<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\VisitorContract;
use OursPrivacy\Visitor\VisitorUpsertParams;
use OursPrivacy\Visitor\VisitorUpsertResponse;

final class VisitorService implements VisitorContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
     *
     * @param array{
     *   token: string,
     *   userProperties: array{
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
     *   email?: string|null,
     *   externalId?: string|null,
     *   userId?: string|null,
     * }|VisitorUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        array|VisitorUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): VisitorUpsertResponse {
        [$parsed, $options] = VisitorUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'identify' : 'https://api.oursprivacy.com/api/v1/identify';

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: VisitorUpsertResponse::class,
        );
    }
}
