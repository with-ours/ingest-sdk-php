<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Contracts\BaseResponse;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackRawContract;
use OursPrivacy\Track\TrackEventParams;
use OursPrivacy\Track\TrackEventResponse;

final class TrackRawService implements TrackRawContract
{
    // @phpstan-ignore-next-line
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
     *     adID?: string|null,
     *     adsetID?: string|null,
     *     basisCid?: string|null,
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
     *     imRef?: string|null,
     *     ip?: string|null,
     *     irclickid?: string|null,
     *     isBot?: string|null,
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
     *   distinctID?: string|null,
     *   email?: string|null,
     *   eventProperties?: array<string,string|null>|null,
     *   externalID?: string|null,
     *   time?: float|null,
     *   userID?: string|null,
     *   userProperties?: array{
     *     adID?: string|null,
     *     adsetID?: string|null,
     *     basisCid?: string|null,
     *     campaignID?: string|null,
     *     city?: string|null,
     *     clickid?: string|null,
     *     clid?: string|null,
     *     companyName?: string|null,
     *     consent?: array<string,string|null>|null,
     *     country?: string|null,
     *     customProperties?: array<string,string|null>|null,
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
     *     imRef?: string|null,
     *     ip?: string|null,
     *     irclickid?: string|null,
     *     isBot?: string|null,
     *     jobTitle?: string|null,
     *     lastName?: string|null,
     *     liFatID?: string|null,
     *     msclkid?: string|null,
     *     ndclid?: string|null,
     *     phoneNumber?: string|null,
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
     *     zip?: string|null,
     *   }|null,
     * }|TrackEventParams $params
     *
     * @return BaseResponse<TrackEventResponse>
     *
     * @throws APIException
     */
    public function event(
        array|TrackEventParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TrackEventParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'track' : 'https://api.oursprivacy.com/api/v1/track';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: $path,
            body: (object) $parsed,
            options: $options,
            convert: TrackEventResponse::class,
        );
    }
}
