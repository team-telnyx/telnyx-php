<?php

namespace Tests\Services\AI\Missions;

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
final class KnowledgeBasesTest extends TestCase
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
    public function testCreateKnowledgeBase(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->createKnowledgeBase(
            'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testDeleteKnowledgeBase(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->deleteKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteKnowledgeBaseWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->deleteKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetKnowledgeBase(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->getKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testGetKnowledgeBaseWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->getKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testListKnowledgeBases(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->listKnowledgeBases(
            'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testUpdateKnowledgeBase(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->updateKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testUpdateKnowledgeBaseWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->knowledgeBases->updateKnowledgeBase(
            'knowledge_base_id',
            missionID: 'mission_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }
}
