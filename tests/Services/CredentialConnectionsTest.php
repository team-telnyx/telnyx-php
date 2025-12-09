<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
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
            'connectionName' => 'my name',
            'password' => 'my123secure456password789',
            'userName' => 'myusername123',
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
            'connectionName' => 'my name',
            'password' => 'my123secure456password789',
            'userName' => 'myusername123',
            'active' => true,
            'anchorsiteOverride' => AnchorsiteOverride::LATENCY,
            'androidPushCredentialID' => '06b09dfd-7154-4980-8b75-cebf7a9d4f8e',
            'callCostInWebhooks' => false,
            'defaultOnHoldComfortNoiseEnabled' => false,
            'dtmfType' => DtmfType::RFC_2833,
            'encodeContactHeaderEnabled' => true,
            'encryptedMedia' => EncryptedMedia::SRTP,
            'inbound' => [
                'aniNumberFormat' => '+E.164',
                'channelLimit' => 10,
                'codecs' => ['G722'],
                'dnisNumberFormat' => '+e164',
                'generateRingbackTone' => true,
                'isupHeadersEnabled' => true,
                'prackEnabled' => true,
                'shakenStirEnabled' => true,
                'sipCompactHeadersEnabled' => true,
                'timeout1xxSecs' => 10,
                'timeout2xxSecs' => 20,
            ],
            'iosPushCredentialID' => 'ec0c8e5d-439e-4620-a0c1-9d9c8d02a836',
            'onnetT38PassthroughEnabled' => true,
            'outbound' => [
                'aniOverride' => 'always',
                'aniOverrideType' => 'always',
                'callParkingEnabled' => true,
                'channelLimit' => 10,
                'generateRingbackTone' => true,
                'instantRingbackEnabled' => true,
                'localization' => 'US',
                'outboundVoiceProfileID' => 'outbound_voice_profile_id',
                't38ReinviteSource' => 'customer',
            ],
            'rtcpSettings' => [
                'captureEnabled' => true,
                'port' => 'rtcp-mux',
                'reportFrequencySecs' => 10,
            ],
            'sipUriCallingPreference' => 'disabled',
            'tags' => ['tag1', 'tag2'],
            'webhookAPIVersion' => '1',
            'webhookEventFailoverURL' => 'https://failover.example.com',
            'webhookEventURL' => 'https://example.com',
            'webhookTimeoutSecs' => 25,
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
