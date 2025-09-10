<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\Client;

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
        $result = $this->client->ai->assistants->scheduledEvents->create(
            'assistant_id',
            scheduledAtFixedDatetime: new \DateTimeImmutable(
                '2025-04-15T13:07:28.764Z'
            ),
            telnyxAgentTarget: 'telnyx_agent_target',
            telnyxConversationChannel: ConversationChannelType::$PHONE_CALL,
            telnyxEndUserTarget: 'telnyx_end_user_target',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->create(
            'assistant_id',
            scheduledAtFixedDatetime: new \DateTimeImmutable(
                '2025-04-15T13:07:28.764Z'
            ),
            telnyxAgentTarget: 'telnyx_agent_target',
            telnyxConversationChannel: ConversationChannelType::$PHONE_CALL,
            telnyxEndUserTarget: 'telnyx_end_user_target',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->retrieve(
            'event_id',
            'assistant_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->retrieve(
            'event_id',
            'assistant_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->list(
            'assistant_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->delete(
            'event_id',
            'assistant_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->scheduledEvents->delete(
            'event_id',
            'assistant_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
