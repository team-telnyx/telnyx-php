<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VirtualCrossConnectsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->create([
            'bgp_asn' => 1234,
            'cloud_provider' => 'aws',
            'cloud_provider_region' => 'us-east-1',
            'network_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            'primary_cloud_account_id' => '123456789012',
            'region_code' => 'ashburn-va',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->create([
            'bgp_asn' => 1234,
            'cloud_provider' => 'aws',
            'cloud_provider_region' => 'us-east-1',
            'network_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            'primary_cloud_account_id' => '123456789012',
            'region_code' => 'ashburn-va',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->update(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->delete(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
