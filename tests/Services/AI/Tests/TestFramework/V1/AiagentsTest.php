<?php

namespace Tests\Services\AI\Tests\TestFramework\V1;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AiagentsTest extends TestCase
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->create(
            agentName: 'Support Bot Under Test',
            assistantID: 'e1a2b3c4-d5e6-f7a8-b9c0-d1e2f3a4b5c6',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TestAgent::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->create(
            agentName: 'Support Bot Under Test',
            assistantID: 'e1a2b3c4-d5e6-f7a8-b9c0-d1e2f3a4b5c6',
            autoFetchCallsEnabled: true,
            autoSyncPromptEnabled: true,
            autoUpdateDropoffNodes: false,
            autoUpdateTopicNodes: false,
            contactNumber: 'contact_number',
            description: 'Evaluates the support assistant against generated callers.',
            inbound: false,
            language: 'en',
            llmMaxTokens: 512,
            llmModel: 'openai/gpt-oss-120b',
            llmSystemPrompt: 'llm_system_prompt',
            llmTemperature: 0.7,
            outboundAutoCall: false,
            sipEndpoint: '',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TestAgent::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->retrieve(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TestAgent::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->update(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TestAgent::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AiagentListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->aiagents->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }
}
