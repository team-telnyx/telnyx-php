<?php

namespace Tests\Services\AI;

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
final class ChatTest extends TestCase
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
    public function testCreateCompletion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->chat->createCompletion(
            messages: [
                ['content' => 'You are a friendly chatbot.', 'role' => 'system'],
                ['content' => 'Hello, world!', 'role' => 'user'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testCreateCompletionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->chat->createCompletion(
            messages: [
                ['content' => 'You are a friendly chatbot.', 'role' => 'system'],
                ['content' => 'Hello, world!', 'role' => 'user'],
            ],
            apiKeyRef: 'api_key_ref',
            bestOf: 0,
            earlyStopping: true,
            frequencyPenalty: 0,
            guidedChoice: ['string'],
            guidedJson: ['foo' => 'bar'],
            guidedRegex: 'guided_regex',
            lengthPenalty: 0,
            logprobs: true,
            maxTokens: 0,
            minP: 0,
            model: 'model',
            n: 0,
            presencePenalty: 0,
            responseFormat: ['type' => 'text'],
            stream: true,
            temperature: 0,
            toolChoice: 'none',
            tools: [
                [
                    'function' => [
                        'name' => 'name',
                        'description' => 'description',
                        'parameters' => ['foo' => 'bar'],
                    ],
                    'type' => 'function',
                ],
            ],
            topLogprobs: 0,
            topP: 0,
            useBeamSearch: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }
}
