<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultPagination;
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
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

        $result = $this->client->fqdnConnections->create(connectionName: 'string');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->fqdnConnections->create(
            connectionName: 'string',
            active: true,
            anchorsiteOverride: AnchorsiteOverride::LATENCY,
            androidPushCredentialID: '06b09dfd-7154-4980-8b75-cebf7a9d4f8e',
            callCostInWebhooks: false,
            defaultOnHoldComfortNoiseEnabled: true,
            dtmfType: DtmfType::RFC_2833,
            encodeContactHeaderEnabled: true,
            encryptedMedia: EncryptedMedia::SRTP,
            inbound: [
                'aniNumberFormat' => '+E.164',
                'channelLimit' => 10,
                'codecs' => ['G722'],
                'defaultPrimaryFqdnID' => 'default_primary_fqdn_id',
                'defaultRoutingMethod' => 'sequential',
                'defaultSecondaryFqdnID' => 'default_secondary_fqdn_id',
                'defaultTertiaryFqdnID' => 'default_tertiary_fqdn_id',
                'dnisNumberFormat' => '+e164',
                'generateRingbackTone' => true,
                'isupHeadersEnabled' => true,
                'prackEnabled' => true,
                'shakenStirEnabled' => true,
                'sipCompactHeadersEnabled' => true,
                'sipRegion' => 'US',
                'sipSubdomain' => 'string',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
                'timeout1xxSecs' => 10,
                'timeout2xxSecs' => 10,
            ],
            iosPushCredentialID: 'ec0c8e5d-439e-4620-a0c1-9d9c8d02a836',
            microsoftTeamsSbc: true,
            noiseSuppression: 'both',
            noiseSuppressionDetails: [
                'attenuationLimit' => 80, 'engine' => 'deep_filter_net',
            ],
            onnetT38PassthroughEnabled: true,
            outbound: [
                'aniOverride' => '+1234567890',
                'aniOverrideType' => 'always',
                'callParkingEnabled' => true,
                'channelLimit' => 10,
                'encryptedMedia' => EncryptedMedia::SRTP,
                'generateRingbackTone' => true,
                'instantRingbackEnabled' => true,
                'ipAuthenticationMethod' => 'credential-authentication',
                'ipAuthenticationToken' => 'aBcD1234',
                'localization' => 'string',
                'outboundVoiceProfileID' => 'outbound_voice_profile_id',
                't38ReinviteSource' => 'customer',
                'techPrefix' => '0123',
                'timeout1xxSecs' => 10,
                'timeout2xxSecs' => 10,
            ],
            rtcpSettings: [
                'captureEnabled' => true,
                'port' => 'rtcp-mux',
                'reportFrequencySecs' => 10,
            ],
            tags: ['tag1', 'tag2'],
            transportProtocol: TransportProtocol::UDP,
            webhookAPIVersion: WebhookAPIVersion::V1,
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookEventURL: 'https://example.com',
            webhookTimeoutSecs: 25,
        );

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

        $result = $this->client->fqdnConnections->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->fqdnConnections->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(FqdnConnection::class, $item);
        }
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
