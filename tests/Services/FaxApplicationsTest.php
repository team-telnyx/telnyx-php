<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListResponse;
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

        $result = $this->client->faxApplications->create([
            'application_name' => 'fax-router',
            'webhook_event_url' => 'https://example.com',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->faxApplications->create([
            'application_name' => 'fax-router',
            'webhook_event_url' => 'https://example.com',
            'active' => false,
            'anchorsite_override' => 'Amsterdam, Netherlands',
            'inbound' => [
                'channel_limit' => 10,
                'sip_subdomain' => 'example',
                'sip_subdomain_receive_settings' => 'only_my_connections',
            ],
            'outbound' => [
                'channel_limit' => 10,
                'outbound_voice_profile_id' => '1293384261075731499',
            ],
            'tags' => ['tag1', 'tag2'],
            'webhook_event_failover_url' => 'https://failover.example.com',
            'webhook_timeout_secs' => 25,
        ]);

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
            [
                'application_name' => 'fax-router',
                'webhook_event_url' => 'https://example.com',
            ],
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
            [
                'application_name' => 'fax-router',
                'webhook_event_url' => 'https://example.com',
                'active' => false,
                'anchorsite_override' => 'Amsterdam, Netherlands',
                'fax_email_recipient' => 'user@example.com',
                'inbound' => [
                    'channel_limit' => 10,
                    'sip_subdomain' => 'example',
                    'sip_subdomain_receive_settings' => 'only_my_connections',
                ],
                'outbound' => [
                    'channel_limit' => 10,
                    'outbound_voice_profile_id' => '1293384261075731499',
                ],
                'tags' => ['tag1', 'tag2'],
                'webhook_event_failover_url' => 'https://failover.example.com',
                'webhook_timeout_secs' => 25,
            ],
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

        $result = $this->client->faxApplications->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FaxApplicationListResponse::class, $result);
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
