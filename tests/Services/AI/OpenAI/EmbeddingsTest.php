<?php

namespace Tests\Services\AI\OpenAI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse;
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
    public function testCreateEmbeddings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->openai->embeddings->createEmbeddings(
            input: 'The quick brown fox jumps over the lazy dog',
            model: 'thenlper/gte-large',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmbeddingNewEmbeddingsResponse::class, $result);
    }

    #[Test]
    public function testCreateEmbeddingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->openai->embeddings->createEmbeddings(
            input: 'The quick brown fox jumps over the lazy dog',
            model: 'thenlper/gte-large',
            dimensions: 0,
            encodingFormat: 'float',
            user: 'user',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmbeddingNewEmbeddingsResponse::class, $result);
    }

    #[Test]
    public function testListEmbeddingModels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->openai->embeddings->listEmbeddingModels();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            EmbeddingListEmbeddingModelsResponse::class,
            $result
        );
    }
}
