<?php

namespace Tests\Services;

use OursPrivacy\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->visitor->upsert([
            'token' => 'x', 'userProperties' => [],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->visitor->upsert([
            'token' => 'x',
            'userProperties' => [
                'ad_id' => 'ad_id',
                'adset_id' => 'adset_id',
                'campaign_id' => 'campaign_id',
                'city' => 'city',
                'clickid' => 'clickid',
                'clid' => 'clid',
                'company_name' => 'company_name',
                'consent' => ['foo' => 'bar'],
                'country' => 'country',
                'custom_properties' => ['foo' => 'bar'],
                'date_of_birth' => 'date_of_birth',
                'dclid' => 'dclid',
                'email' => 'email',
                'epik' => 'epik',
                'external_id' => 'external_id',
                'fbc' => 'fbc',
                'fbclid' => 'fbclid',
                'fbp' => 'fbp',
                'first_name' => 'first_name',
                'gad_source' => 'gad_source',
                'gbraid' => 'gbraid',
                'gclid' => 'gclid',
                'gender' => 'gender',
                'ip' => 'ip',
                'irclickid' => 'irclickid',
                'is_bot' => [],
                'job_title' => 'job_title',
                'last_name' => 'last_name',
                'li_fat_id' => 'li_fat_id',
                'msclkid' => 'msclkid',
                'ndclid' => 'ndclid',
                'phone_number' => [],
                'qclid' => 'qclid',
                'rdt_cid' => 'rdt_cid',
                'referrer' => 'referrer',
                'sacid' => 'sacid',
                'sccid' => 'sccid',
                'sid' => 'sid',
                'state' => 'state',
                'ttclid' => 'ttclid',
                'twclid' => 'twclid',
                'user_agent' => 'user_agent',
                'user_agent_full_list' => 'user_agent_full_list',
                'utm_campaign' => 'utm_campaign',
                'utm_content' => 'utm_content',
                'utm_medium' => 'utm_medium',
                'utm_name' => 'utm_name',
                'utm_source' => 'utm_source',
                'utm_term' => 'utm_term',
                'wbraid' => 'wbraid',
                'zip' => [],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
