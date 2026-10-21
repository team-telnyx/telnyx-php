<?php

namespace Tests\Services\TtsIntegrations;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;
use Telnyx\TtsIntegrations\CommunityTtsEngine;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testDisable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->disable('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testEnable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->enable('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testRefreshVoices(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->refreshVoices('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testRequestReview(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->requestReview('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsEngine::class, $result);
    }

    #[Test]
    public function testTestConnection(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->testConnection(
            'id',
            apiKeyRef: 'acme-engine-key'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsConformanceRun::class, $result);
    }

    #[Test]
    public function testTestConnectionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ttsIntegrations->actions->testConnection(
            'id',
            apiKeyRef: 'acme-engine-key',
            voiceID: 'alpha'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommunityTtsConformanceRun::class, $result);
    }
}
