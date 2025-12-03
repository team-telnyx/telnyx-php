<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListResponse;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FqdnConnectionsTest extends TestCase
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

        $result = $this->client->fqdnConnections->create([
            'connection_name' => 'string',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->create([
            'connection_name' => 'string',
            'active' => true,
            'anchorsite_override' => 'Latency',
            'android_push_credential_id' => '06b09dfd-7154-4980-8b75-cebf7a9d4f8e',
            'call_cost_in_webhooks' => false,
            'default_on_hold_comfort_noise_enabled' => true,
            'dtmf_type' => 'RFC 2833',
            'encode_contact_header_enabled' => true,
            'encrypted_media' => 'SRTP',
            'inbound' => [
                'ani_number_format' => '+E.164',
                'channel_limit' => 10,
                'codecs' => ['G722'],
                'default_primary_fqdn_id' => 'default_primary_fqdn_id',
                'default_routing_method' => 'sequential',
                'default_secondary_fqdn_id' => 'default_secondary_fqdn_id',
                'default_tertiary_fqdn_id' => 'default_tertiary_fqdn_id',
                'dnis_number_format' => '+e164',
                'generate_ringback_tone' => true,
                'isup_headers_enabled' => true,
                'prack_enabled' => true,
                'shaken_stir_enabled' => true,
                'sip_compact_headers_enabled' => true,
                'sip_region' => 'US',
                'sip_subdomain' => 'string',
                'sip_subdomain_receive_settings' => 'only_my_connections',
                'timeout_1xx_secs' => 10,
                'timeout_2xx_secs' => 10,
            ],
            'ios_push_credential_id' => 'ec0c8e5d-439e-4620-a0c1-9d9c8d02a836',
            'microsoft_teams_sbc' => true,
            'onnet_t38_passthrough_enabled' => true,
            'outbound' => [
                'ani_override' => '+1234567890',
                'ani_override_type' => 'always',
                'call_parking_enabled' => true,
                'channel_limit' => 10,
                'encrypted_media' => 'SRTP',
                'generate_ringback_tone' => true,
                'instant_ringback_enabled' => true,
                'ip_authentication_method' => 'credential-authentication',
                'ip_authentication_token' => 'aBcD1234',
                'localization' => 'string',
                'outbound_voice_profile_id' => 'outbound_voice_profile_id',
                't38_reinvite_source' => 'customer',
                'tech_prefix' => '0123',
                'timeout_1xx_secs' => 10,
                'timeout_2xx_secs' => 10,
            ],
            'rtcp_settings' => [
                'capture_enabled' => true,
                'port' => 'rtcp-mux',
                'report_frequency_secs' => 10,
            ],
            'tags' => ['tag1', 'tag2'],
            'transport_protocol' => 'UDP',
            'webhook_api_version' => '1',
            'webhook_event_failover_url' => 'https://failover.example.com',
            'webhook_event_url' => 'https://example.com',
            'webhook_timeout_secs' => 25,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->update('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionDeleteResponse::class, $result);
    }
}
