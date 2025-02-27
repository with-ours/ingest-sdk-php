<?php
/**
 * OursPrivacyApiTest
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 */

namespace OpenAPI\Client\Test\Api;

use OpenAPI\Client\Api\OursPrivacyApi;  // Make sure this matches the actual namespace of your generated OursPrivacyApi
use OpenAPI\Client\Configuration;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\ObjectSerializer;
use PHPUnit\Framework\TestCase;

/**
 * OursPrivacyApiTest Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 */
class OursPrivacyApiTest extends TestCase
{
    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for identify
     *
     * Identify Users.
     */
    public function testIdentify()
    {
        $api = new OursPrivacyApi();
        $this->assertTrue(
            method_exists($api, 'identify'),
            'OursPrivacyApi::identify() method does not exist.'
        );
    }

    /**
     * Test case for track
     *
     * Track Events.
     */
    public function testTrack()
    {
        $api = new OursPrivacyApi();
        $this->assertTrue(
            method_exists($api, 'track'),
            'OursPrivacyApi::track() method does not exist.'
        );
    }
}