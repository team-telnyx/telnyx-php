<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultFlatPagination;
use Telnyx\UacConnections\UacConnectionDeleteResponse;
use Telnyx\UacConnections\UacConnectionGetResponse;
use Telnyx\UacConnections\UacConnectionListResponse;
use Telnyx\UacConnections\UacConnectionNewResponse;
use Telnyx\UacConnections\UacConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class UacConnectionsTest extends TestCase
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

        $result = $this->client->uacConnections->create(connectionName: 'my name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UacConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->uacConnections->create(
            connectionName: 'my name',
            active: true,
            anchorsiteOverride: AnchorsiteOverride::LATENCY,
            androidPushCredentialID: '06b09dfd-7154-4980-8b75-cebf7a9d4f8e',
            callCostInWebhooks: false,
            defaultOnHoldComfortNoiseEnabled: false,
            dtmfType: DtmfType::RFC_2833,
            encodeContactHeaderEnabled: true,
            encryptedMedia: EncryptedMedia::SRTP,
            externalUacSettings: [
                'authUsername' => 'auth8492',
                'expirationSec' => 600,
                'fromUser' => '8492',
                'outboundProxy' => 'outbound.sip-pbx.acme.example:5061',
                'password' => 'testtesttest',
                'proxy' => 'sip-pbx.acme.example',
                'transport' => 'TLS',
                'username' => 'ext8492',
            ],
            inbound: [
                'aniNumberFormat' => '+E.164',
                'channelLimit' => 10,
                'codecs' => ['G722'],
                'defaultRoutingMethod' => 'sequential',
                'dnisNumberFormat' => '+e164',
                'generateRingbackTone' => true,
                'isupHeadersEnabled' => true,
                'prackEnabled' => true,
                'shakenStirEnabled' => true,
                'simultaneousRinging' => 'disabled',
                'sipCompactHeadersEnabled' => true,
                'timeout1xxSecs' => 10,
                'timeout2xxSecs' => 20,
            ],
            internalUacSettings: [
                'destinationUri' => '14155550123@acme.sip.telnyx.com',
            ],
            iosPushCredentialID: 'ec0c8e5d-439e-4620-a0c1-9d9c8d02a836',
            jitterBuffer: [
                'enableJitterBuffer' => true,
                'jitterbufferMsecMax' => 200,
                'jitterbufferMsecMin' => 60,
            ],
            noiseSuppression: 'both',
            noiseSuppressionDetails: [
                'attenuationLimit' => 80, 'engine' => 'deep_filter_net',
            ],
            onnetT38PassthroughEnabled: true,
            outbound: [
                'aniOverride' => 'always',
                'aniOverrideType' => 'always',
                'callParkingEnabled' => true,
                'channelLimit' => 10,
                'generateRingbackTone' => true,
                'instantRingbackEnabled' => true,
                'localization' => 'US',
                'outboundVoiceProfileID' => '1293384261075731499',
                't38ReinviteSource' => 'customer',
            ],
            password: 'my123secure456password789',
            rtcpSettings: [
                'captureEnabled' => true,
                'port' => 'rtcp-mux',
                'reportFrequencySecs' => 10,
            ],
            sipUriCallingPreference: 'disabled',
            tags: ['tag1', 'tag2'],
            userName: 'myusername123',
            webhookAPIVersion: '1',
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookEventURL: 'https://example.com',
            webhookTimeoutSecs: 25,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UacConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->uacConnections->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UacConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->uacConnections->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UacConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->uacConnections->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(UacConnectionListResponse::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->uacConnections->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UacConnectionDeleteResponse::class, $result);
    }
}
