<?php

namespace Tests\Services\AI\Tests\TestFramework\V1;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;
use Telnyx\AI\Tests\TestFramework\V1\Metrics\ScenarioGenerationResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MetricsTest extends TestCase
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

        $result = $this->client->ai->tests->testFramework->v1->metrics->create(
            name: 'Escalates on refund denial'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AITestMetric::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->create(
            name: 'Escalates on refund denial',
            addToNewAgents: false,
            agents: [1259],
            assistantID: 'assistant_id',
            audioEnabled: true,
            description: 'Returns a score for whether the assistant escalates when the caller\'s refund is denied.',
            displayOrder: 0,
            enumValues: ['string'],
            evalType: 'continuous_qualitative',
            observabilityEnabled: true,
            prompt: 'Score the assistant\'s escalation behaviour between 0.0 and 1.0.',
            samplingEnabled: true,
            simulationEnabled: true,
            type: 'llm_judge',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AITestMetric::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->retrieve(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AITestMetric::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->update(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AITestMetric::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsNotResource($result);
    }

    #[Test]
    public function testBulkCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->bulkCreate(
            body: [['name' => 'Greets within 5 seconds']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testBulkCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->tests->testFramework->v1->metrics->bulkCreate(
            body: [
                [
                    'name' => 'Greets within 5 seconds',
                    'addToNewAgents' => false,
                    'agents' => [1259],
                    'assistantID' => 'assistant_id',
                    'audioEnabled' => true,
                    'description' => 'Returns whether the assistant greeted the caller within five seconds.',
                    'displayOrder' => 0,
                    'enumValues' => ['string'],
                    'evalType' => 'continuous_qualitative',
                    'observabilityEnabled' => true,
                    'prompt' => 'Score whether the greeting was timely and natural.',
                    'samplingEnabled' => true,
                    'simulationEnabled' => true,
                    'type' => 'llm_judge',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testGenerateMetrics(): void
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
            ->metrics
            ->generateMetrics(agentID: 1259, numMetrics: 5)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioGenerationResponse::class, $result);
    }

    #[Test]
    public function testGenerateMetricsWithOptionalParams(): void
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
            ->metrics
            ->generateMetrics(agentID: 1259, numMetrics: 5, scenarios: [9512])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScenarioGenerationResponse::class, $result);
    }

    #[Test]
    public function testRetrieveGenerateMetricsProgress(): void
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
            ->metrics
            ->retrieveGenerateMetricsProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MetricGetGenerateMetricsProgressResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveGenerateMetricsProgressWithOptionalParams(): void
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
            ->metrics
            ->retrieveGenerateMetricsProgress(progressID: 'progress_id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MetricGetGenerateMetricsProgressResponse::class,
            $result
        );
    }
}
