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
            'bgpAsn' => 1234,
            'cloudProvider' => 'aws',
            'cloudProviderRegion' => 'us-east-1',
            'networkID' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            'primaryCloudAccountID' => '123456789012',
            'regionCode' => 'ashburn-va',
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
            'bgpAsn' => 1234,
            'cloudProvider' => 'aws',
            'cloudProviderRegion' => 'us-east-1',
            'networkID' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            'primaryCloudAccountID' => '123456789012',
            'regionCode' => 'ashburn-va',
            'bandwidthMbps' => 50,
            'name' => 'test interface',
            'primaryBgpKey' => 'yFV4wEPtPVPfDUGLWiyQzwga',
            'primaryCloudIP' => '169.254.0.2',
            'primaryTelnyxIP' => '169.254.0.1',
            'secondaryBgpKey' => 'ge1lONeK9RcA83uuWaw9DvZy',
            'secondaryCloudAccountID' => '',
            'secondaryCloudIP' => '169.254.0.4',
            'secondaryTelnyxIP' => '169.254.0.3',
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
