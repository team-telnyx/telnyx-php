<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\NetworkRoutes\NetworkRouteGetResponse;
use Telnyx\NetworkRoutes\NetworkRouteListResponse;
use Telnyx\NetworkRoutes\NetworkRouteNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NetworkRoutesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->create(
            cidr: '10.20.0.0/16',
            networkID: '91446ee3-5b1c-4f0e-8d2a-6c7e9b0a1f24',
            nextHop: [
                'id' => '62d438d2-8a51-4c5e-9d0c-1f6b2a7e4c39', 'type' => 'tunnel',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NetworkRouteNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->create(
            cidr: '10.20.0.0/16',
            networkID: '91446ee3-5b1c-4f0e-8d2a-6c7e9b0a1f24',
            nextHop: [
                'id' => '62d438d2-8a51-4c5e-9d0c-1f6b2a7e4c39', 'type' => 'tunnel',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NetworkRouteNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->retrieve(
            'e8a2c5d0-3f7b-4a19-b6d2-9c1e0f8a7b53'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NetworkRouteGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->list(
            filter: ['networkID' => '91446ee3-5b1c-4f0e-8d2a-6c7e9b0a1f24']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NetworkRouteListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->list(
            filter: [
                'networkID' => '91446ee3-5b1c-4f0e-8d2a-6c7e9b0a1f24',
                'cidr' => '10.20.0.0/16',
                'nextHopType' => 'tunnel',
                'origin' => 'static',
                'status' => 'active',
            ],
            page: ['after' => 'after', 'limit' => 1],
            sort: '-created_at',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NetworkRouteListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->networkRoutes->delete(
            'e8a2c5d0-3f7b-4a19-b6d2-9c1e0f8a7b53'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
