<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $result = $this->client->texmlApplications->create([
            'friendly_name' => 'call-router', 'voice_url' => 'https://example.com',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlApplicationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texmlApplications->create([
            'friendly_name' => 'call-router',
            'voice_url' => 'https://example.com',
            'active' => false,
            'anchorsite_override' => 'Amsterdam, Netherlands',
            'call_cost_in_webhooks' => false,
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
                'outbound_voice_profile_id' => '1293384261075731499',
            ],
            'status_callback' => 'https://example.com',
            'status_callback_method' => 'get',
            'tags' => ['tag1', 'tag2'],
            'voice_fallback_url' => 'https://fallback.example.com',
            'voice_method' => 'get',
        ]);

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
            ['friendly_name' => 'call-router', 'voice_url' => 'https://example.com'],
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
            [
                'friendly_name' => 'call-router',
                'voice_url' => 'https://example.com',
                'active' => false,
                'anchorsite_override' => 'Amsterdam, Netherlands',
                'call_cost_in_webhooks' => false,
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
                    'outbound_voice_profile_id' => '1293384261075731499',
                ],
                'status_callback' => 'https://example.com',
                'status_callback_method' => 'get',
                'tags' => ['tag1', 'tag2'],
                'voice_fallback_url' => 'https://fallback.example.com',
                'voice_method' => 'get',
            ],
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

        $result = $this->client->texmlApplications->list([]);

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
