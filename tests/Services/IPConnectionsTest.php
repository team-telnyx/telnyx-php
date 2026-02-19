<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\IPConnections\IPConnection;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IPConnectionsTest extends TestCase
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

        $result = $this->client->ipConnections->create();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ipConnections->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ipConnections->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->ipConnections->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(IPConnection::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ipConnections->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPConnectionDeleteResponse::class, $result);
    }
}
