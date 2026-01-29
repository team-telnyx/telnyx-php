<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WirelessTest extends TestCase
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
    public function testRetrieveRegions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wireless->retrieveRegions(product: 'public_ips');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WirelessGetRegionsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveRegionsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wireless->retrieveRegions(product: 'public_ips');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WirelessGetRegionsResponse::class, $result);
    }
}
