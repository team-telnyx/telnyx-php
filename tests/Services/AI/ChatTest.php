<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreateCompletion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->chat->createCompletion([
            'messages' => [
                ['content' => 'You are a friendly chatbot.', 'role' => 'system'],
                ['content' => 'Hello, world!', 'role' => 'user'],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertTrue($result);
    }

    #[Test]
    public function testCreateCompletionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->chat->createCompletion([
            'messages' => [
                ['content' => 'You are a friendly chatbot.', 'role' => 'system'],
                ['content' => 'Hello, world!', 'role' => 'user'],
            ],
            'api_key_ref' => 'api_key_ref',
            'best_of' => 0,
            'early_stopping' => true,
            'frequency_penalty' => 0,
            'guided_choice' => ['string'],
            'guided_json' => ['foo' => 'bar'],
            'guided_regex' => 'guided_regex',
            'length_penalty' => 0,
            'logprobs' => true,
            'max_tokens' => 0,
            'min_p' => 0,
            'model' => 'model',
            'n' => 0,
            'presence_penalty' => 0,
            'response_format' => ['type' => 'text'],
            'stream' => true,
            'temperature' => 0,
            'tool_choice' => 'none',
            'tools' => [
                [
                    'function' => [
                        'name' => 'name',
                        'description' => 'description',
                        'parameters' => ['foo' => 'bar'],
                    ],
                    'type' => 'function',
                ],
            ],
            'top_logprobs' => 0,
            'top_p' => 0,
            'use_beam_search' => true,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertTrue($result);
    }
}
