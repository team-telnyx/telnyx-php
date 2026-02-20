<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExternalConnectionsTest extends TestCase
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

        $result = $this->client->externalConnections->create(
            externalSipConnection: 'zoom',
            outbound: []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->create(
            externalSipConnection: 'zoom',
            outbound: [
                'channelLimit' => 10, 'outboundVoiceProfileID' => '1911630617284445511',
            ],
            active: false,
            inbound: [
                'outboundVoiceProfileID' => '12345678-1234-1234-1234-123456789012',
                'channelLimit' => 10,
            ],
            tags: ['tag1', 'tag2'],
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookEventURL: 'https://example.com',
            webhookTimeoutSecs: 25,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->retrieve(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->update(
            '1293384261075731499',
            outbound: ['outboundVoiceProfileID' => '1911630617284445511'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->update(
            '1293384261075731499',
            outbound: [
                'outboundVoiceProfileID' => '1911630617284445511', 'channelLimit' => 10,
            ],
            active: false,
            inbound: ['channelLimit' => 10],
            tags: ['tag1', 'tag2'],
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookEventURL: 'https://example.com',
            webhookTimeoutSecs: 25,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->externalConnections->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ExternalConnection::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->delete('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionDeleteResponse::class, $result);
    }

    #[Test]
    public function testUpdateLocation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            staticEmergencyAddressID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalConnectionUpdateLocationResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateLocationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            staticEmergencyAddressID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalConnectionUpdateLocationResponse::class,
            $result
        );
    }
}
