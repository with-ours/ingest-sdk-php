<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\VisitorContract;
use OursPrivacy\Visitor\VisitorUpsertResponse;

final class VisitorService implements VisitorContract
{
    /**
     * @api
     */
    public VisitorRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VisitorRawService($client);
    }

    /**
     * @api
     *
     * Define visitor properties on an existing visitor or create a new visitor. Note: This does not fire an event. If you want to fire an event, use the track method and include properties for the visitor.
     *
     * @param string $token The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     * @param array{
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   alart?: string|null,
     *   aleid?: string|null,
     *   basisCid?: string|null,
     *   campaignID?: string|null,
     *   city?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   companyName?: string|null,
     *   consent?: array<string,string|null>|null,
     *   country?: string|null,
     *   customProperties?: array<string,string|null>|null,
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
     *   imRef?: string|null,
     *   ip?: string|null,
     *   irclickid?: string|null,
     *   isBot?: string|null,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: string|null,
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
     *   wbraid?: string|null,
     *   zip?: string|null,
     * } $userProperties User properties to associate with this user. The existing user properties will be updated. And all future events will have these properties associated with them.
     * @param array{
     *   activeDuration?: float|null,
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   alart?: string|null,
     *   aleid?: string|null,
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
     *   isBot?: string|null,
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
     * }|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     *
     * @throws APIException
     */
    public function upsert(
        string $token,
        array $userProperties,
        ?array $defaultProperties = null,
        ?string $email = null,
        ?string $externalID = null,
        ?string $userID = null,
        ?RequestOptions $requestOptions = null,
    ): VisitorUpsertResponse {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'userProperties' => $userProperties,
                'defaultProperties' => $defaultProperties,
                'email' => $email,
                'externalID' => $externalID,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
