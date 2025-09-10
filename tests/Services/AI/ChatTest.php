<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\Client;

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
        $result = $this->client->ai->chat->createCompletion(
            messages: [
                Message::with(content: 'You are a friendly chatbot.', role: 'system'),
                Message::with(content: 'Hello, world!', role: 'user'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateCompletionWithOptionalParams(): void
    {
        $result = $this->client->ai->chat->createCompletion(
            messages: [
                Message::with(content: 'You are a friendly chatbot.', role: 'system'),
                Message::with(content: 'Hello, world!', role: 'user'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
