<?php

declare(strict_types=1);

namespace OursPrivacy\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Exceptions\APIException;
use OursPrivacy\Core\Util;
use OursPrivacy\RequestOptions;
use OursPrivacy\ServiceContracts\TrackContract;
use OursPrivacy\Track\TrackEventResponse;

final class TrackService implements TrackContract
{
    /**
     * @api
     */
    public TrackRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrackRawService($client);
    }

    /**
     * @api
     *
     * Track events from your server. Please include at least one of: userId, externalId, or email. These properties help us associate events with existing users. For all fields, null values unset the property and undefined values do not unset existing properties.
     *
     * @param string $token The token for your Ours Privacy Source. You can find this in the Ours dashboard.
     * @param string $event The name of the event you're tracking. This must be whitelisted in the Ours dashboard.
     * @param array{
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
     * }|null $defaultProperties These properties are used throughout the Ours app to pass known values onto destinations
     * @param string|null $distinctID A unique identifier for the event. This helps prevent duplicate events.
     * @param string|null $email The email address of a user. We will associate this event with the user or create a user. Used for lookup if externalId and userId are not included in the request.
     * @param array<string,mixed>|null $eventProperties any additional event properties you want to pass along
     * @param string|null $externalID The externalId (the ID in your system) of a user. We will associate this event with the user or create a user. If included in the request, email lookup is ignored.
     * @param float|null $time The time at which the event occurred in milliseconds since UTC epoch. The time must be in the past and within the last 7 days.
     * @param string|null $userID The Ours user id stored in local storage and cookies on your web properties. If userId is included in the request, we do not lookup the user by email or externalId.
     * @param array{
     *   adID?: string|null,
     *   adsetID?: string|null,
     *   basisCid?: string|null,
     *   campaignID?: string|null,
     *   city?: string|null,
     *   clickid?: string|null,
     *   clid?: string|null,
     *   companyName?: string|null,
     *   consent?: array<string,mixed>|null,
     *   country?: string|null,
     *   customProperties?: array<string,mixed>|null,
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
     *   isBot?: mixed,
     *   jobTitle?: string|null,
     *   lastName?: string|null,
     *   liFatID?: string|null,
     *   msclkid?: string|null,
     *   ndclid?: string|null,
     *   phoneNumber?: mixed,
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
     *   zip?: mixed,
     * }|null $userProperties Properties to set on the visitor. (optional) You can also update these properties via the identify endpoint.
     *
     * @throws APIException
     */
    public function event(
        string $token,
        string $event,
        ?array $defaultProperties = null,
        ?string $distinctID = null,
        ?string $email = null,
        ?array $eventProperties = null,
        ?string $externalID = null,
        ?float $time = null,
        ?string $userID = null,
        ?array $userProperties = null,
        ?RequestOptions $requestOptions = null,
    ): TrackEventResponse {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'event' => $event,
                'defaultProperties' => $defaultProperties,
                'distinctID' => $distinctID,
                'email' => $email,
                'eventProperties' => $eventProperties,
                'externalID' => $externalID,
                'time' => $time,
                'userID' => $userID,
                'userProperties' => $userProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->event(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
