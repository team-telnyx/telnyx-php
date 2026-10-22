<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterDeleteResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterGetResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterNewResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TailscaleSubnetRoutersTest extends TestCase
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

        $result = $this->client->tailscaleSubnetRouters->create(
            advertisedRoutes: ['172.27.0.0/24'],
            authKey: 'tskey-auth-k1AbCdEfGh2IjKlMnOpQrStUv',
            name: 'tailnet-ashburn',
            networkID: '0de011ae-ee53-4df4-ba96-754728eb5aad',
            regionCode: 'ashburn-va',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TailscaleSubnetRouterNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->tailscaleSubnetRouters->create(
            advertisedRoutes: ['172.27.0.0/24'],
            authKey: 'tskey-auth-k1AbCdEfGh2IjKlMnOpQrStUv',
            name: 'tailnet-ashburn',
            networkID: '0de011ae-ee53-4df4-ba96-754728eb5aad',
            regionCode: 'ashburn-va',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TailscaleSubnetRouterNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->tailscaleSubnetRouters->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TailscaleSubnetRouterGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->tailscaleSubnetRouters->update(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TailscaleSubnetRouterUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->tailscaleSubnetRouters->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(TailscaleSubnetRouter::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->tailscaleSubnetRouters->delete(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TailscaleSubnetRouterDeleteResponse::class,
            $result
        );
    }
}
