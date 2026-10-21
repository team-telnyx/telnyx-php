<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\TtsIntegrations\CommunityTtsAudioFormat;
use Telnyx\TtsIntegrations\CommunityTtsEngine;
use Telnyx\TtsIntegrations\CommunityTtsEngineVisibility;
use Telnyx\TtsIntegrations\TtsIntegrationGetConformanceRunsResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse;
use Telnyx\TtsIntegrations\TtsIntegrationListResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TtsIntegrationsTest extends TestCase
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

        $result = $this->client->ttsIntegrations->create(
            capabilities: ['streamedAudio' => true],
            name: 'acme',
            supportedAudioFormats: [CommunityTtsAudioFormat::LINEAR16],
            voicesURL: 'https://tts.acme.example/voices',
            websocketURL: 'wss://tts.acme.example/v1',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->create(
            capabilities: [
                'streamedAudio' => true,
                'flushSupport' => true,
                'forceInterruptSupport' => true,
                'ssmlSupport' => true,
                'voiceSettingsSchema' => [
                    'voice_speed' => (object) [], 'emotion' => (object) [],
                ],
            ],
            name: 'acme',
            supportedAudioFormats: [CommunityTtsAudioFormat::LINEAR16],
            voicesURL: 'https://tts.acme.example/voices',
            websocketURL: 'wss://tts.acme.example/v1',
            connectTimeoutMs: 500,
            contactEmail: 'contact_email',
            dataRetentionPolicyURL: 'data_retention_policy_url',
            documentationURL: 'https://tts.acme.example/docs',
            visibility: CommunityTtsEngineVisibility::PRIVATE,
            voicesAPIKeyRef: 'voices_api_key_ref',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TtsIntegrationListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->replace('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testRetrieveConformanceRuns(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->retrieveConformanceRuns('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TtsIntegrationGetConformanceRunsResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveDiscoverable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->retrieveDiscoverable();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TtsIntegrationGetDiscoverableResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveVoices(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->retrieveVoices('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TtsIntegrationGetVoicesResponse::class, $result);
    }
}
