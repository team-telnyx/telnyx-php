<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\DefaultPagination;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TexmlApplicationsTest extends TestCase
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

        $result = $this->client->texmlApplications->create(
            friendlyName: 'call-router',
            voiceURL: 'https://example.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->create(
            friendlyName: 'call-router',
            voiceURL: 'https://example.com',
            active: false,
            anchorsiteOverride: AnchorsiteOverride::AMSTERDAM_NETHERLANDS,
            callCostInWebhooks: false,
            dtmfType: DtmfType::INBAND,
            firstCommandTimeout: true,
            firstCommandTimeoutSecs: 10,
            inbound: [
                'channelLimit' => 10,
                'shakenStirEnabled' => true,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10, 'outboundVoiceProfileID' => '1293384261075731499',
            ],
            statusCallback: 'https://example.com',
            statusCallbackMethod: 'get',
            tags: ['tag1', 'tag2'],
            voiceFallbackURL: 'https://fallback.example.com',
            voiceMethod: 'get',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->retrieve('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->update(
            '1293384261075731499',
            friendlyName: 'call-router',
            voiceURL: 'https://example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->update(
            '1293384261075731499',
            friendlyName: 'call-router',
            voiceURL: 'https://example.com',
            active: false,
            anchorsiteOverride: AnchorsiteOverride::AMSTERDAM_NETHERLANDS,
            callCostInWebhooks: false,
            dtmfType: DtmfType::INBAND,
            firstCommandTimeout: true,
            firstCommandTimeoutSecs: 10,
            inbound: [
                'channelLimit' => 10,
                'shakenStirEnabled' => true,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10, 'outboundVoiceProfileID' => '1293384261075731499',
            ],
            statusCallback: 'https://example.com',
            statusCallbackMethod: 'get',
            tags: ['tag1', 'tag2'],
            voiceFallbackURL: 'https://fallback.example.com',
            voiceMethod: 'get',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->delete('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationDeleteResponse::class, $result);
    }
}
