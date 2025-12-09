<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestListResponse;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TestsTest extends TestCase
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

        $result = $this->client->ai->assistants->tests->create([
            'destination' => '+15551234567',
            'instructions' => 'Act as a frustrated customer who received a damaged product. Ask for a refund and escalate if not satisfied with the initial response.',
            'name' => 'Customer Support Bot Test',
            'rubric' => [
                [
                    'criteria' => 'Assistant responds within 30 seconds',
                    'name' => 'Response Time',
                ],
                [
                    'criteria' => 'Provides correct product information',
                    'name' => 'Accuracy',
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantTest::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->create([
            'destination' => '+15551234567',
            'instructions' => 'Act as a frustrated customer who received a damaged product. Ask for a refund and escalate if not satisfied with the initial response.',
            'name' => 'Customer Support Bot Test',
            'rubric' => [
                [
                    'criteria' => 'Assistant responds within 30 seconds',
                    'name' => 'Response Time',
                ],
                [
                    'criteria' => 'Provides correct product information',
                    'name' => 'Accuracy',
                ],
            ],
            'description' => 'description',
            'max_duration_seconds' => 1,
            'telnyx_conversation_channel' => TelnyxConversationChannel::WEB_CHAT,
            'test_suite' => 'test_suite',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantTest::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->retrieve('test_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantTest::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->update('test_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantTest::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TestListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->delete('test_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
