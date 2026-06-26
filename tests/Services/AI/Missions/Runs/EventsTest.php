<?php

namespace Tests\Services\AI\Missions\Runs;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsResponse;
use Telnyx\AI\Missions\Runs\Events\EventLogResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->ai->missions->runs->events->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(EventData::class, $item);
        }
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->ai->missions->runs->events->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            agentID: 'agent_id',
            pageNumber: 1,
            pageSize: 1,
            stepID: 'step_id',
            type: 'type',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(EventData::class, $item);
        }
    }

    #[Test]
    public function testGetEventDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->events->getEventDetails(
            'event_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventGetEventDetailsResponse::class, $result);
    }

    #[Test]
    public function testGetEventDetailsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->events->getEventDetails(
            'event_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventGetEventDetailsResponse::class, $result);
    }

    #[Test]
    public function testLog(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->events->log(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            summary: 'summary',
            type: 'status_change',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventLogResponse::class, $result);
    }

    #[Test]
    public function testLogWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->events->log(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            summary: 'summary',
            type: 'status_change',
            agentID: 'agent_id',
            idempotencyKey: 'idempotency_key',
            payload: ['foo' => 'bar'],
            stepID: 'step_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventLogResponse::class, $result);
    }
}
