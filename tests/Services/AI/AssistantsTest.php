<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class AssistantsTest extends TestCase
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
        $result = $this->client->ai->assistants->create(
            instructions: 'instructions',
            model: 'model',
            name: 'name'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->create(
            instructions: 'instructions',
            model: 'model',
            name: 'name'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->ai->assistants->retrieve('assistant_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->ai->assistants->update('assistant_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->ai->assistants->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->ai->assistants->delete('assistant_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testChat(): void
    {
        $result = $this->client->ai->assistants->chat(
            'assistant_id',
            content: 'Tell me a joke about cats',
            conversationID: '42b20469-1215-4a9a-8964-c36f66b406f4',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testChatWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->chat(
            'assistant_id',
            content: 'Tell me a joke about cats',
            conversationID: '42b20469-1215-4a9a-8964-c36f66b406f4',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testClone(): void
    {
        $result = $this->client->ai->assistants->clone('assistant_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetTexml(): void
    {
        $result = $this->client->ai->assistants->getTexml('assistant_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testImport(): void
    {
        $result = $this->client->ai->assistants->import(
            apiKeyRef: 'api_key_ref',
            provider: 'elevenlabs'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testImportWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->import(
            apiKeyRef: 'api_key_ref',
            provider: 'elevenlabs'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
