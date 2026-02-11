<?php

namespace Tests\Services\AI\OpenAI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EmbeddingsTest extends TestCase
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

        $result = $this->client->ai->openai->embeddings->create(
            input: 'The quick brown fox jumps over the lazy dog',
            model: 'thenlper/gte-large',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmbeddingNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->openai->embeddings->create(
            input: 'The quick brown fox jumps over the lazy dog',
            model: 'thenlper/gte-large',
            dimensions: 0,
            encodingFormat: 'float',
            user: 'user',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmbeddingNewResponse::class, $result);
    }

    #[Test]
    public function testListModels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->openai->embeddings->listModels();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmbeddingListModelsResponse::class, $result);
    }
}
