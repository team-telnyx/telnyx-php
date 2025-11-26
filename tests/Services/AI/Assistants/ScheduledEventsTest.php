<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ScheduledEventsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->create(
            'assistant_id',
            [
                'scheduled_at_fixed_datetime' => '2025-04-15T13:07:28.764Z',
                'telnyx_agent_target' => 'telnyx_agent_target',
                'telnyx_conversation_channel' => 'phone_call',
                'telnyx_end_user_target' => 'telnyx_end_user_target',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->create(
            'assistant_id',
            [
                'scheduled_at_fixed_datetime' => '2025-04-15T13:07:28.764Z',
                'telnyx_agent_target' => 'telnyx_agent_target',
                'telnyx_conversation_channel' => 'phone_call',
                'telnyx_end_user_target' => 'telnyx_end_user_target',
                'conversation_metadata' => ['foo' => 'string'],
                'text' => 'text',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->retrieve(
            'event_id',
            ['assistant_id' => 'assistant_id']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->retrieve(
            'event_id',
            ['assistant_id' => 'assistant_id']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->list(
            'assistant_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ScheduledEventListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->delete(
            'event_id',
            ['assistant_id' => 'assistant_id']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertTrue($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->scheduledEvents->delete(
            'event_id',
            ['assistant_id' => 'assistant_id']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertTrue($result);
    }
}
