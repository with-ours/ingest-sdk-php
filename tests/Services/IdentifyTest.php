<?php

namespace Tests\Services;

use OursPrivacy\Client;
use OursPrivacy\Identify\IdentifyCreateOrUpdateParams\UserProperties;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IdentifyTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreateOrUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->identify->createOrUpdate(
            token: 'x',
            userProperties: (new UserProperties)
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->identify->createOrUpdate(
            token: 'x',
            userProperties: (new UserProperties)
                ->withAdID('ad_id')
                ->withAdsetID('adset_id')
                ->withCampaignID('campaign_id')
                ->withCity('city')
                ->withClickid('clickid')
                ->withClid('clid')
                ->withCompanyName('company_name')
                ->withConsent(['foo' => 'bar'])
                ->withCountry('country')
                ->withCustomProperties(['foo' => 'bar'])
                ->withDateOfBirth('date_of_birth')
                ->withDclid('dclid')
                ->withEmail('email')
                ->withEpik('epik')
                ->withExternalID('external_id')
                ->withFbc('fbc')
                ->withFbclid('fbclid')
                ->withFbp('fbp')
                ->withFirstName('first_name')
                ->withGadSource('gad_source')
                ->withGbraid('gbraid')
                ->withGclid('gclid')
                ->withGender('gender')
                ->withIP('ip')
                ->withIsBot((object) [])
                ->withJobTitle('job_title')
                ->withLastName('last_name')
                ->withLiFatID('li_fat_id')
                ->withMsclkid('msclkid')
                ->withNdclid('ndclid')
                ->withPhoneNumber((object) [])
                ->withQclid('qclid')
                ->withRdtCid('rdt_cid')
                ->withReferrer('referrer')
                ->withSacid('sacid')
                ->withSccid('sccid')
                ->withSid('sid')
                ->withState('state')
                ->withTtclid('ttclid')
                ->withTwclid('twclid')
                ->withUserAgent('user_agent')
                ->withUserAgentFullList('user_agent_full_list')
                ->withUtmCampaign('utm_campaign')
                ->withUtmContent('utm_content')
                ->withUtmMedium('utm_medium')
                ->withUtmName('utm_name')
                ->withUtmSource('utm_source')
                ->withUtmTerm('utm_term')
                ->withWbraid('wbraid')
                ->withZip((object) []),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
