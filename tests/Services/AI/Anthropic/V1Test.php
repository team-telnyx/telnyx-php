<?php

namespace Tests\Services\AI\Anthropic;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class V1Test extends TestCase
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
    public function testMessages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->anthropic->v1->messages(
            maxTokens: 1024,
            messages: [['role' => 'bar', 'content' => 'bar']],
            model: 'zai-org/GLM-5.2',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testMessagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->anthropic->v1->messages(
            maxTokens: 1024,
            messages: [['role' => 'bar', 'content' => 'bar']],
            model: 'zai-org/GLM-5.2',
            apiKeyRef: 'api_key_ref',
            billingGroupID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            fallbackConfig: ['foo' => 'bar'],
            maxRetries: 0,
            mcpServers: [['foo' => 'bar']],
            metadata: ['foo' => 'bar'],
            serviceTier: 'service_tier',
            stopSequences: ['string'],
            stream: true,
            system: 'You are a friendly chatbot.',
            temperature: 0,
            thinking: ['foo' => 'bar'],
            timeout: 0,
            toolChoice: ['foo' => 'bar'],
            tools: [['foo' => 'bar']],
            topK: 0,
            topP: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }
}
