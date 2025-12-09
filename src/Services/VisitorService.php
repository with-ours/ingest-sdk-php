<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
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
     *     adID?: string|null,
     *     adsetID?: string|null,
     *     campaignID?: string|null,
     *     city?: string|null,
     *     clickid?: string|null,
     *     clid?: string|null,
     *     companyName?: string|null,
     *     consent?: array<string,mixed>|null,
     *     country?: string|null,
     *     customProperties?: array<string,mixed>|null,
     *     dateOfBirth?: string|null,
     *     dclid?: string|null,
     *     email?: string|null,
     *     epik?: string|null,
     *     externalID?: string|null,
     *     fbc?: string|null,
     *     fbclid?: string|null,
     *     fbp?: string|null,
     *     firstName?: string|null,
     *     gadSource?: string|null,
     *     gbraid?: string|null,
     *     gclid?: string|null,
     *     gender?: string|null,
     *     ip?: string|null,
     *     irclickid?: string|null,
     *     isBot?: mixed,
     *     jobTitle?: string|null,
     *     lastName?: string|null,
     *     liFatID?: string|null,
     *     msclkid?: string|null,
     *     ndclid?: string|null,
     *     phoneNumber?: mixed,
     *     qclid?: string|null,
     *     rdtCid?: string|null,
     *     referrer?: string|null,
     *     referringDomain?: string|null,
     *     sacid?: string|null,
     *     sccid?: string|null,
     *     sid?: string|null,
     *     state?: string|null,
     *     ttclid?: string|null,
     *     twclid?: string|null,
     *     userAgent?: string|null,
     *     userAgentFullList?: string|null,
     *     utmCampaign?: string|null,
     *     utmContent?: string|null,
     *     utmMedium?: string|null,
     *     utmName?: string|null,
     *     utmSource?: string|null,
     *     utmTerm?: string|null,
     *     wbraid?: string|null,
     *     zip?: mixed,
     *   },
     *   defaultProperties?: array{
     *     activeDuration?: float|null,
     *     adID?: string|null,
     *     adsetID?: string|null,
     *     browserLanguage?: string|null,
     *     browserName?: string|null,
     *     browserVersion?: string|null,
     *     campaignID?: string|null,
     *     clickid?: string|null,
     *     clid?: string|null,
     *     cpuArchitecture?: string|null,
     *     currentURL?: string|null,
     *     dclid?: string|null,
     *     deviceModel?: string|null,
     *     deviceType?: string|null,
     *     deviceVendor?: string|null,
     *     duration?: float|null,
     *     encoding?: string|null,
     *     engineName?: string|null,
     *     engineVersion?: string|null,
     *     epik?: string|null,
     *     fbc?: string|null,
     *     fbclid?: string|null,
     *     fbp?: string|null,
     *     fv?: bool|null,
     *     gadSource?: string|null,
     *     gbraid?: string|null,
     *     gclid?: string|null,
     *     host?: string|null,
     *     iframe?: bool|null,
     *     ip?: string|null,
     *     irclickid?: string|null,
     *     isBot?: mixed,
     *     liFatID?: string|null,
     *     msclkid?: string|null,
     *     ndclid?: string|null,
     *     newS?: bool|null,
     *     osName?: string|null,
     *     osVersion?: string|null,
     *     pageHash?: float|null,
     *     pathname?: string|null,
     *     qclid?: string|null,
     *     rdtCid?: string|null,
     *     receivedAt?: string|null,
     *     referrer?: string|null,
     *     referringDomain?: string|null,
     *     sacid?: string|null,
     *     sccid?: string|null,
     *     screenHeight?: float|null,
     *     screenWidth?: float|null,
     *     sessionCount?: float|null,
     *     sid?: string|null,
     *     sr?: string|null,
     *     title?: string|null,
     *     ttclid?: string|null,
     *     twclid?: string|null,
     *     uafvl?: string|null,
     *     userAgent?: string|null,
     *     utmCampaign?: string|null,
     *     utmContent?: string|null,
     *     utmMedium?: string|null,
     *     utmName?: string|null,
     *     utmSource?: string|null,
     *     utmTerm?: string|null,
     *     version?: string|null,
     *     wbraid?: string|null,
     *     webview?: bool|null,
     *   }|null,
     *   email?: string|null,
     *   externalID?: string|null,
     *   userID?: string|null,
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

        /** @var BaseResponse<VisitorUpsertResponse> */
        $response = $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: VisitorUpsertResponse::class,
        );

        return $response->parse();
    }
}
