<?php

namespace Tests\Services\MeetingSessions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testSendChat(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->actions->sendChat(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            text: 'I will send the summary after this call.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAcceptedResponse::class, $result);
    }

    #[Test]
    public function testSendChatWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->actions->sendChat(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            text: 'I will send the summary after this call.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAcceptedResponse::class, $result);
    }

    #[Test]
    public function testSpeak(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->actions->speak(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            text: 'Here are the three decisions from this call.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAcceptedResponse::class, $result);
    }

    #[Test]
    public function testSpeakWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->actions->speak(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            text: 'Here are the three decisions from this call.',
            interrupt: false,
            voice: 'x',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAcceptedResponse::class, $result);
    }

    #[Test]
    public function testStopSpeaking(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->actions->stopSpeaking(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAcceptedResponse::class, $result);
    }
}
