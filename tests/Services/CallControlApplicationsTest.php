<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallControlApplicationsTest extends TestCase
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

        $result = $this->client->callControlApplications->create([
            'application_name' => 'call-router',
            'webhook_event_url' => 'https://example.com',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallControlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->create([
            'application_name' => 'call-router',
            'webhook_event_url' => 'https://example.com',
            'active' => false,
            'anchorsite_override' => 'Latency',
            'call_cost_in_webhooks' => true,
            'dtmf_type' => 'Inband',
            'first_command_timeout' => true,
            'first_command_timeout_secs' => 10,
            'inbound' => [
                'channel_limit' => 10,
                'shaken_stir_enabled' => true,
                'sip_subdomain' => 'example',
                'sip_subdomain_receive_settings' => 'only_my_connections',
            ],
            'outbound' => [
                'channel_limit' => 10,
                'outbound_voice_profile_id' => 'outbound_voice_profile_id',
            ],
            'redact_dtmf_debug_logging' => true,
            'webhook_api_version' => '1',
            'webhook_event_failover_url' => 'https://failover.example.com',
            'webhook_timeout_secs' => 25,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallControlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallControlApplicationGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->update(
            'id',
            [
                'application_name' => 'call-router',
                'webhook_event_url' => 'https://example.com',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CallControlApplicationUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->update(
            'id',
            [
                'application_name' => 'call-router',
                'webhook_event_url' => 'https://example.com',
                'active' => false,
                'anchorsite_override' => 'Latency',
                'call_cost_in_webhooks' => true,
                'dtmf_type' => 'Inband',
                'first_command_timeout' => true,
                'first_command_timeout_secs' => 10,
                'inbound' => [
                    'channel_limit' => 10,
                    'shaken_stir_enabled' => true,
                    'sip_subdomain' => 'example',
                    'sip_subdomain_receive_settings' => 'only_my_connections',
                ],
                'outbound' => [
                    'channel_limit' => 10,
                    'outbound_voice_profile_id' => 'outbound_voice_profile_id',
                ],
                'redact_dtmf_debug_logging' => true,
                'tags' => ['tag1', 'tag2'],
                'webhook_api_version' => '1',
                'webhook_event_failover_url' => 'https://failover.example.com',
                'webhook_timeout_secs' => 25,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CallControlApplicationUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CallControlApplicationDeleteResponse::class,
            $result
        );
    }
}
