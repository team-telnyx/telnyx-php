<?php

namespace Tests\Services\AI\Missions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\RunCancelRunResponse;
use Telnyx\AI\Missions\Runs\RunGetResponse;
use Telnyx\AI\Missions\Runs\RunNewResponse;
use Telnyx\AI\Missions\Runs\RunPauseRunResponse;
use Telnyx\AI\Missions\Runs\RunResumeRunResponse;
use Telnyx\AI\Missions\Runs\RunUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RunsTest extends TestCase
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

        $result = $this->client->ai->missions->runs->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            error: 'error',
            metadata: ['foo' => 'bar'],
            resultPayload: ['foo' => 'bar'],
            resultSummary: 'result_summary',
            status: 'pending',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->ai->missions->runs->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MissionRunData::class, $item);
        }
    }

    #[Test]
    public function testCancelRun(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->cancelRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunCancelRunResponse::class, $result);
    }

    #[Test]
    public function testCancelRunWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->cancelRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunCancelRunResponse::class, $result);
    }

    #[Test]
    public function testListRuns(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->ai->missions->runs->listRuns();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MissionRunData::class, $item);
        }
    }

    #[Test]
    public function testPauseRun(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->pauseRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunPauseRunResponse::class, $result);
    }

    #[Test]
    public function testPauseRunWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->pauseRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunPauseRunResponse::class, $result);
    }

    #[Test]
    public function testResumeRun(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->resumeRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunResumeRunResponse::class, $result);
    }

    #[Test]
    public function testResumeRunWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->resumeRun(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RunResumeRunResponse::class, $result);
    }
}
