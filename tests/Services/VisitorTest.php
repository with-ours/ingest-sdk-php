<?php

namespace Tests\Services;

use OursPrivacy\Client;
use OursPrivacy\Core\Util;
use OursPrivacy\Visitor\VisitorUpsertResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VisitorTest extends TestCase
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
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->visitor->upsert(token: 'x', userProperties: []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VisitorUpsertResponse::class, $result);
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->visitor->upsert(
            token: 'x',
            userProperties: [
                'adID' => 'ad_id',
                'adsetID' => 'adset_id',
                'alart' => 'alart',
                'aleid' => 'aleid',
                'basisCid' => 'basis_cid',
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
                'imRef' => 'im_ref',
                'ip' => 'ip',
                'irclickid' => 'irclickid',
                'isBot' => 'is_bot',
                'jobTitle' => 'job_title',
                'lastName' => 'last_name',
                'liFatID' => 'li_fat_id',
                'msclkid' => 'msclkid',
                'ndclid' => 'ndclid',
                'phoneNumber' => 'phone_number',
                'qclid' => 'qclid',
                'rdtCid' => 'rdt_cid',
                'referrer' => 'referrer',
                'referringDomain' => 'referring_domain',
                'sacid' => 'sacid',
                'sccid' => 'sccid',
                'sid' => 'sid',
                'state' => 'state',
                'ttclid' => 'ttclid',
                'twclid' => 'twclid',
                'userAgent' => 'user_agent',
                'userAgentFullList' => 'user_agent_full_list',
                'utmCampaign' => 'utm_campaign',
                'utmContent' => 'utm_content',
                'utmMedium' => 'utm_medium',
                'utmName' => 'utm_name',
                'utmSource' => 'utm_source',
                'utmTerm' => 'utm_term',
                'wbraid' => 'wbraid',
                'zip' => 'zip',
            ],
            defaultProperties: [
                'activeDuration' => 0,
                'adID' => 'ad_id',
                'adsetID' => 'adset_id',
                'alart' => 'alart',
                'aleid' => 'aleid',
                'basisCid' => 'basis_cid',
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
                'host' => 'host',
                'iframe' => true,
                'imRef' => 'im_ref',
                'ip' => 'ip',
                'irclickid' => 'irclickid',
                'isBot' => 'is_bot',
                'liFatID' => 'li_fat_id',
                'msclkid' => 'msclkid',
                'ndclid' => 'ndclid',
                'newS' => true,
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
                'wbraid' => 'wbraid',
                'webview' => true,
            ],
            email: 'x',
            externalID: 'x',
            userID: 'x',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VisitorUpsertResponse::class, $result);
    }
}
