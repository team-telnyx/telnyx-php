<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\DefaultFlatPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FaxApplicationsTest extends TestCase
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

        $result = $this->client->faxApplications->create(
            applicationName: 'fax-router',
            webhookEventURL: 'https://example.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->create(
            applicationName: 'fax-router',
            webhookEventURL: 'https://example.com',
            active: false,
            anchorsiteOverride: AnchorsiteOverride::AMSTERDAM_NETHERLANDS,
            inbound: [
                'channelLimit' => 10,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10, 'outboundVoiceProfileID' => '1293384261075731499',
            ],
            tags: ['tag1', 'tag2'],
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookTimeoutSecs: 25,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->retrieve('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->update(
            '1293384261075731499',
            applicationName: 'fax-router',
            webhookEventURL: 'https://example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->update(
            '1293384261075731499',
            applicationName: 'fax-router',
            webhookEventURL: 'https://example.com',
            active: false,
            anchorsiteOverride: AnchorsiteOverride::AMSTERDAM_NETHERLANDS,
            faxEmailRecipient: 'user@example.com',
            inbound: [
                'channelLimit' => 10,
                'sipSubdomain' => 'example',
                'sipSubdomainReceiveSettings' => 'only_my_connections',
            ],
            outbound: [
                'channelLimit' => 10, 'outboundVoiceProfileID' => '1293384261075731499',
            ],
            tags: ['tag1', 'tag2'],
            webhookEventFailoverURL: 'https://failover.example.com',
            webhookTimeoutSecs: 25,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->faxApplications->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(FaxApplication::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->delete('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationDeleteResponse::class, $result);
    }
}
