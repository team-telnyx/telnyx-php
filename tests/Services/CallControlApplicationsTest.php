<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\CallControlApplications\CallControlApplication;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->create(
            applicationName: 'call-router',
            webhookEventURL: 'https://example.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallControlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->callControlApplications->create(
            applicationName: 'call-router',
            webhookEventURL: 'https://example.com',
            active: false,
            anchorsiteOverride: 'Latency',
            callCostInWebhooks: true,
            dtmfType: 'Inband',
            firstCommandTimeout: true,
            firstCommandTimeoutSecs: 10,
            inbound: [
                'channelLimit' => 10,
                'shakenStirEnabled' => true,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10,
                'outboundVoiceProfileID' => 'outbound_voice_profile_id',
            ],
            redactDtmfDebugLogging: true,
            webhookAPIVersion: '1',
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookTimeoutSecs: 25,
        );

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
            applicationName: 'call-router',
            webhookEventURL: 'https://example.com',
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
            applicationName: 'call-router',
            webhookEventURL: 'https://example.com',
            active: false,
            anchorsiteOverride: 'Latency',
            callCostInWebhooks: true,
            dtmfType: 'Inband',
            firstCommandTimeout: true,
            firstCommandTimeoutSecs: 10,
            inbound: [
                'channelLimit' => 10,
                'shakenStirEnabled' => true,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10,
                'outboundVoiceProfileID' => 'outbound_voice_profile_id',
            ],
            redactDtmfDebugLogging: true,
            tags: ['tag1', 'tag2'],
            webhookAPIVersion: '1',
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookTimeoutSecs: 25,
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

        $page = $this->client->callControlApplications->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(CallControlApplication::class, $item);
        }
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
