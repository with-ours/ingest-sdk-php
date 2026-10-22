<?php

namespace Tests\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Util;
use OursPrivacy\Track\TrackEventResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TrackTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->track->event(token: 'P', event: 'P');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackEventResponse::class, $result);
    }

    #[Test]
    public function testEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->track->event(
            token: 'P',
            event: 'P',
            defaultProperties: [
                '_efTransactionID' => '_ef_transaction_id',
                'activeDuration' => 0,
                'adID' => 'ad_id',
                'admitadUid' => 'admitad_uid',
                'adsetID' => 'adset_id',
                'alart' => 'alart',
                'aleid' => 'aleid',
                'axwrt' => 'axwrt',
                'basisCid' => 'basis_cid',
                'beeswaxAuctionID' => 'beeswax_auction_id',
                'browserLanguage' => 'browser_language',
                'browserName' => 'browser_name',
                'browserVersion' => 'browser_version',
                'campaignID' => 'campaign_id',
                'clickid' => 'clickid',
                'clid' => 'clid',
                'cpuArchitecture' => 'cpu_architecture',
                'currentURL' => 'current_url',
                'dclid' => 'dclid',
                'deviceModel' => 'device_model',
                'deviceType' => 'device_type',
                'deviceVendor' => 'device_vendor',
                'duration' => 0,
                'encoding' => 'encoding',
                'engineName' => 'engine_name',
                'engineVersion' => 'engine_version',
                'epik' => 'epik',
                'fbc' => 'fbc',
                'fbclid' => 'fbclid',
                'fbp' => 'fbp',
                'fv' => true,
                'gadSource' => 'gad_source',
                'gbraid' => 'gbraid',
                'gclid' => 'gclid',
                'graid' => 'graid',
                'grclid' => 'grclid',
                'host' => 'host',
                'iframe' => true,
                'imRef' => 'im_ref',
                'ip' => 'ip',
                'irclickid' => 'irclickid',
                'isBot' => 'string',
                'liFatID' => 'li_fat_id',
                'msclkid' => 'msclkid',
                'ndclid' => 'ndclid',
                'newS' => true,
                'obClickID' => 'ob_click_id',
                'oppref' => 'oppref',
                'osName' => 'os_name',
                'osVersion' => 'os_version',
                'pageHash' => 0,
                'pathname' => 'pathname',
                'qclid' => 'qclid',
                'rdtCid' => 'rdt_cid',
                'receivedAt' => 'received_at',
                'referrer' => 'referrer',
                'referringDomain' => 'referring_domain',
                'sacid' => 'sacid',
                'sccid' => 'sccid',
                'screenHeight' => 0,
                'screenWidth' => 0,
                'sessionCount' => 0,
                'sid' => 'sid',
                'sr' => 'sr',
                'title' => 'title',
                'ttclid' => 'ttclid',
                'ttdImpressionID' => 'ttd_impression_id',
                'twclid' => 'twclid',
                'uafvl' => 'uafvl',
                'userAgent' => 'user_agent',
                'utmCampaign' => 'utm_campaign',
                'utmContent' => 'utm_content',
                'utmMedium' => 'utm_medium',
                'utmName' => 'utm_name',
                'utmSource' => 'utm_source',
                'utmTerm' => 'utm_term',
                'version' => 'version',
                'viantClickID' => 'viant_click_id',
                'viantImpressionID' => 'viant_impression_id',
                'wbraid' => 'wbraid',
                'webview' => true,
                'ylpcid' => 'ylpcid',
            ],
            distinctID: 'P',
            email: 'P',
            eventProperties: ['foo' => 'string'],
            externalID: 'P',
            identityContext: ['ip' => 'ip', 'userAgent' => 'userAgent'],
            time: 0,
            userID: 'P',
            userProperties: [
                '_efTransactionID' => '_ef_transaction_id',
                'adID' => 'ad_id',
                'admitadUid' => 'admitad_uid',
                'adsetID' => 'adset_id',
                'alart' => 'alart',
                'aleid' => 'aleid',
                'axwrt' => 'axwrt',
                'basisCid' => 'basis_cid',
                'beeswaxAuctionID' => 'beeswax_auction_id',
                'campaignID' => 'campaign_id',
                'city' => 'city',
                'clickid' => 'clickid',
                'clid' => 'clid',
                'companyName' => 'company_name',
                'consent' => ['foo' => 'string'],
                'country' => 'country',
                'customProperties' => ['foo' => 'string'],
                'dateOfBirth' => 'date_of_birth',
                'dclid' => 'dclid',
                'email' => 'email',
                'epik' => 'epik',
                'externalID' => 'external_id',
                'fbc' => 'fbc',
                'fbclid' => 'fbclid',
                'fbp' => 'fbp',
                'firstName' => 'first_name',
                'gadSource' => 'gad_source',
                'gbraid' => 'gbraid',
                'gclid' => 'gclid',
                'gender' => 'gender',
                'graid' => 'graid',
                'grclid' => 'grclid',
                'imRef' => 'im_ref',
                'ip' => 'ip',
                'irclickid' => 'irclickid',
                'isBot' => 'string',
                'jobTitle' => 'job_title',
                'lastName' => 'last_name',
                'liFatID' => 'li_fat_id',
                'msclkid' => 'msclkid',
                'ndclid' => 'ndclid',
                'obClickID' => 'ob_click_id',
                'oppref' => 'oppref',
                'phoneNumber' => 'string',
                'qclid' => 'qclid',
                'rdtCid' => 'rdt_cid',
                'referrer' => 'referrer',
                'referringDomain' => 'referring_domain',
                'sacid' => 'sacid',
                'sccid' => 'sccid',
                'sid' => 'sid',
                'state' => 'state',
                'ttclid' => 'ttclid',
                'ttdImpressionID' => 'ttd_impression_id',
                'twclid' => 'twclid',
                'userAgent' => 'user_agent',
                'userAgentFullList' => 'user_agent_full_list',
                'utmCampaign' => 'utm_campaign',
                'utmContent' => 'utm_content',
                'utmMedium' => 'utm_medium',
                'utmName' => 'utm_name',
                'utmSource' => 'utm_source',
                'utmTerm' => 'utm_term',
                'viantClickID' => 'viant_click_id',
                'viantImpressionID' => 'viant_impression_id',
                'wbraid' => 'wbraid',
                'ylpcid' => 'ylpcid',
                'zip' => 'string',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackEventResponse::class, $result);
    }
}
