<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListResponse;
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

        $result = $this->client->externalConnections->create([
            'external_sip_connection' => 'zoom', 'outbound' => [],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->create([
            'external_sip_connection' => 'zoom',
            'outbound' => [
                'channel_limit' => 10,
                'outbound_voice_profile_id' => 'outbound_voice_profile_id',
            ],
            'active' => false,
            'inbound' => [
                'outbound_voice_profile_id' => '12345678-1234-1234-1234-123456789012',
                'channel_limit' => 10,
            ],
            'tags' => ['tag1', 'tag2'],
            'webhook_event_failover_url' => 'https://failover.example.com',
            'webhook_event_url' => 'https://example.com',
            'webhook_timeout_secs' => 25,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->update(
            'id',
            [
                'outbound' => [
                    'outbound_voice_profile_id' => 'outbound_voice_profile_id',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->update(
            'id',
            [
                'outbound' => [
                    'outbound_voice_profile_id' => 'outbound_voice_profile_id',
                    'channel_limit' => 10,
                ],
                'active' => false,
                'inbound' => ['channel_limit' => 10],
                'tags' => ['tag1', 'tag2'],
                'webhook_event_failover_url' => 'https://failover.example.com',
                'webhook_event_url' => 'https://example.com',
                'webhook_timeout_secs' => 25,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalConnectionDeleteResponse::class, $result);
    }

    #[Test]
    public function testUpdateLocation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                'static_emergency_address_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ],
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                'static_emergency_address_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalConnectionUpdateLocationResponse::class,
            $result
        );
    }
}
