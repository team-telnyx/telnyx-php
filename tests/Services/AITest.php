<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\AIGetConversationHistoriesResponse;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\AI\ModelsResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AITest extends TestCase
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
    public function testCreateResponseDeprecated(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->createResponseDeprecated(
            responseRequest: ['model' => 'bar', 'input' => 'bar']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testCreateResponseDeprecatedWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->createResponseDeprecated(
            responseRequest: ['model' => 'bar', 'input' => 'bar']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testRetrieveConversationHistories(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->retrieveConversationHistories(
            q: 'customer called about billing issue',
            recordType: 'voice'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AIGetConversationHistoriesResponse::class, $result);
    }

    #[Test]
    public function testRetrieveConversationHistoriesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->retrieveConversationHistories(
            q: 'customer called about billing issue',
            recordType: 'voice',
            filterDocumentID: 'doc-789',
            filterIngestedAtGte: new \DateTimeImmutable('2026-01-01T00:00:00Z'),
            filterIngestedAtLte: new \DateTimeImmutable('2026-12-31T23:59:59Z'),
            filterRecordCreatedAtGte: new \DateTimeImmutable('2026-01-01T00:00:00Z'),
            filterRecordCreatedAtLte: new \DateTimeImmutable('2026-12-31T23:59:59Z'),
            filterRecordID: 'rec-001',
            filterRegionIn: 'USA,DEU',
            filterRetention: 'filter[retention]',
            filterUserID: 'user-123',
            minScore: 0.5,
            region: 'USA',
            topK: 10,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AIGetConversationHistoriesResponse::class, $result);
    }

    #[Test]
    public function testRetrieveModels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->retrieveModels();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ModelsResponse::class, $result);
    }

    #[Test]
    public function testSummarize(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->summarize(
            bucket: 'bucket',
            filename: 'filename'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AISummarizeResponse::class, $result);
    }

    #[Test]
    public function testSummarizeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->summarize(
            bucket: 'bucket',
            filename: 'filename',
            systemPrompt: 'system_prompt'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AISummarizeResponse::class, $result);
    }
}
