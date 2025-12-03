<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectNewResponse::class, $result);
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
            'bandwidth_mbps' => 50,
            'name' => 'test interface',
            'primary_bgp_key' => 'yFV4wEPtPVPfDUGLWiyQzwga',
            'primary_cloud_ip' => '169.254.0.2',
            'primary_telnyx_ip' => '169.254.0.1',
            'secondary_bgp_key' => 'ge1lONeK9RcA83uuWaw9DvZy',
            'secondary_cloud_account_id' => '',
            'secondary_cloud_ip' => '169.254.0.4',
            'secondary_telnyx_ip' => '169.254.0.3',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectNewResponse::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectGetResponse::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->virtualCrossConnects->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectListResponse::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VirtualCrossConnectDeleteResponse::class, $result);
    }
}
