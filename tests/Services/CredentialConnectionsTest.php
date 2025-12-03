<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CredentialConnectionsTest extends TestCase
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

        $result = $this->client->credentialConnections->create([
            'connection_name' => 'my name',
            'password' => 'my123secure456password789',
            'user_name' => 'myusername123',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->credentialConnections->create([
            'connection_name' => 'my name',
            'password' => 'my123secure456password789',
            'user_name' => 'myusername123',
            'active' => true,
            'anchorsite_override' => 'Latency',
            'android_push_credential_id' => '06b09dfd-7154-4980-8b75-cebf7a9d4f8e',
            'call_cost_in_webhooks' => false,
            'default_on_hold_comfort_noise_enabled' => false,
            'dtmf_type' => 'RFC 2833',
            'encode_contact_header_enabled' => true,
            'encrypted_media' => 'SRTP',
            'inbound' => [
                'ani_number_format' => '+E.164',
                'channel_limit' => 10,
                'codecs' => ['G722'],
                'dnis_number_format' => '+e164',
                'generate_ringback_tone' => true,
                'isup_headers_enabled' => true,
                'prack_enabled' => true,
                'shaken_stir_enabled' => true,
                'sip_compact_headers_enabled' => true,
                'timeout_1xx_secs' => 10,
                'timeout_2xx_secs' => 20,
            ],
            'ios_push_credential_id' => 'ec0c8e5d-439e-4620-a0c1-9d9c8d02a836',
            'onnet_t38_passthrough_enabled' => true,
            'outbound' => [
                'ani_override' => 'always',
                'ani_override_type' => 'always',
                'call_parking_enabled' => true,
                'channel_limit' => 10,
                'generate_ringback_tone' => true,
                'instant_ringback_enabled' => true,
                'localization' => 'US',
                'outbound_voice_profile_id' => 'outbound_voice_profile_id',
                't38_reinvite_source' => 'customer',
            ],
            'rtcp_settings' => [
                'capture_enabled' => true,
                'port' => 'rtcp-mux',
                'report_frequency_secs' => 10,
            ],
            'sip_uri_calling_preference' => 'disabled',
            'tags' => ['tag1', 'tag2'],
            'webhook_api_version' => '1',
            'webhook_event_failover_url' => 'https://failover.example.com',
            'webhook_event_url' => 'https://example.com',
            'webhook_timeout_secs' => 25,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->credentialConnections->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->credentialConnections->update('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->credentialConnections->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->credentialConnections->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CredentialConnectionDeleteResponse::class, $result);
    }
}
