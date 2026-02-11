<?php

namespace Tests\Services\AI\Missions\Runs;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanGetStepDetailsResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanNewResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PlanTest extends TestCase
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

        $result = $this->client->ai->missions->runs->plan->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            steps: [
                ['description' => 'description', 'sequence' => 0, 'stepID' => 'step_id'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            steps: [
                [
                    'description' => 'description',
                    'sequence' => 0,
                    'stepID' => 'step_id',
                    'metadata' => ['foo' => 'bar'],
                    'parentStepID' => 'parent_step_id',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanGetResponse::class, $result);
    }

    #[Test]
    public function testAddStepsToPlan(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->addStepsToPlan(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            steps: [
                ['description' => 'description', 'sequence' => 0, 'stepID' => 'step_id'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanAddStepsToPlanResponse::class, $result);
    }

    #[Test]
    public function testAddStepsToPlanWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->addStepsToPlan(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            steps: [
                [
                    'description' => 'description',
                    'sequence' => 0,
                    'stepID' => 'step_id',
                    'metadata' => ['foo' => 'bar'],
                    'parentStepID' => 'parent_step_id',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanAddStepsToPlanResponse::class, $result);
    }

    #[Test]
    public function testGetStepDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->getStepDetails(
            'step_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanGetStepDetailsResponse::class, $result);
    }

    #[Test]
    public function testGetStepDetailsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->getStepDetails(
            'step_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanGetStepDetailsResponse::class, $result);
    }

    #[Test]
    public function testUpdateStep(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->updateStep(
            'step_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanUpdateStepResponse::class, $result);
    }

    #[Test]
    public function testUpdateStepWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->missions->runs->plan->updateStep(
            'step_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            metadata: ['foo' => 'bar'],
            status: 'pending',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PlanUpdateStepResponse::class, $result);
    }
}
