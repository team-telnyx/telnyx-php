<?php

namespace Tests\Services\AI\Tests\TestFramework\V1;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetGenerateProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosResponse;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ScenariosTest extends TestCase
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

        $result = $this->client->ai->tests->testFramework->v1->scenarios->create(
            name: 'Refund escalation flow',
            personality: 4643
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EvaluatorScenarioDetail::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->scenarios->create(
            name: 'Refund escalation flow',
            personality: 4643,
            agent: 1259,
            expectedOutcomePrompt: 'The assistant explains the refund policy and offers escalation.',
            firstMessage: 'Hi, I want a refund.',
            folderPath: 'folder_path',
            instructions: 'Call the support line and demand a refund for a damaged product.',
            metrics: [266881],
            tags: ['support'],
            testProfile: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EvaluatorScenarioDetail::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->scenarios->retrieve(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EvaluatorScenarioDetail::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->scenarios->update(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EvaluatorScenarioDetail::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->scenarios->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->scenarios->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testGenerateBg(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->generateBg(numScenarios: 5)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioGenerationResponse::class, $result);
    }

    #[Test]
    public function testGenerateBgWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->generateBg(
                numScenarios: 5,
                agentID: 1259,
                extraInstructions: 'Focus on angry customers asking about refunds.',
                firstMessage: 'first_message',
                folderPath: 'folder_path',
                generateExpectedOutcomes: true,
                inboundPhoneNumber: 0,
                personalities: [0],
                scenarioType: 'workflow',
                tags: ['string'],
                testProfile: 0,
                toolIDs: ['string'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioGenerationResponse::class, $result);
    }

    #[Test]
    public function testRetrieveExportScenarios(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveExportScenarios(exportType: 'csv', scenarioIDs: 'scenario_ids')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testRetrieveExportScenariosWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveExportScenarios(
                exportType: 'csv',
                scenarioIDs: 'scenario_ids',
                agentID: 0
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testRetrieveGenerateProgress(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveGenerateProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ScenarioGetGenerateProgressResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveGenerateProgressWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveGenerateProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ScenarioGetGenerateProgressResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveScenarioAgentProgress(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveScenarioAgentProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ScenarioGetScenarioAgentProgressResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveScenarioAgentProgressWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->retrieveScenarioAgentProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ScenarioGetScenarioAgentProgressResponse::class,
            $result
        );
    }

    #[Test]
    public function testRunScenarios(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->runScenarios()
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioRunScenariosResponse::class, $result);
    }

    #[Test]
    public function testScenarioAgent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->scenarioAgent(
                scenarios: 'all',
                userMessage: 'Make the callers ask about damaged packaging too.',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioScenarioAgentResponse::class, $result);
    }

    #[Test]
    public function testScenarioAgentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->ai
            ->tests
            ->testFramework
            ->v1
            ->scenarios
            ->scenarioAgent(
                scenarios: 'all',
                userMessage: 'Make the callers ask about damaged packaging too.',
                agentID: 1259,
                agentResolutionResponse: 'agent_resolution_response',
                applyChanges: true,
                context: [
                    ['content' => 'content', 'role' => 'role', 'timestamp' => 'timestamp'],
                ],
                knowledgeBase: [0],
                numScenarios: 0,
                pendingToolCalls: [['foo' => 'bar']],
                scenariosNeedingAgent: [0],
                sessionID: 0,
                updatedScenarios: [['foo' => 'bar']],
            );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioScenarioAgentResponse::class, $result);
    }
}
