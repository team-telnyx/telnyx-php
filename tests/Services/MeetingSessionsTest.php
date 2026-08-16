<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MeetingSessionsTest extends TestCase
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

        $result = $this->client->meetingSessions->create(
            meetingURL: 'https://zoom.us/j/1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->create(
            meetingURL: 'https://zoom.us/j/1234567890',
            assistant: [
                'id' => 'asst_fake-uuid-1234',
                'callControlConnectionID' => 'conn-fake-abcdef',
                'from' => '+12025550199',
                'loopbackSipUri' => 'sip:loopback@example.invalid',
                'audioGate' => 'half_duplex',
            ],
            avatar: [
                'apiKey' => 'fake_avatar_api_key_do_not_use',
                'avatarID' => 'avatar_fake-001',
                'provider' => 'anam',
            ],
            bargeIn: true,
            botName: 'Notetaker',
            cameraImage: [
                'base64Data' => '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/wAALCAACAAIBAREA/8QAFAABAAAAAAAAAAAAAAAAAAAACP/EAB4QAAAEBwAAAAAAAAAAAAAAAAAEBgcCFic1RVNi/9oACAEBAAA/AH8hGJbWR09TxKW4vhC2qHgf/9k=',
                'format' => 'jpeg',
            ],
            idempotencyKey: 'x',
            joinAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            metadata: ['foo' => 'bar'],
            speakOnEnter: 'x',
            summarizeOnEnd: true,
            voice: 'x',
            webhookURL: 'https://example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->retrieve(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->update(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->delete(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionResponse::class, $result);
    }

    #[Test]
    public function testDeleteRecordingMedia(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->deleteRecordingMedia(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MeetingSessionDeleteRecordingMediaResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveEvents(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->retrieveEvents(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionGetEventsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveRecordings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->retrieveRecordings(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MeetingSessionGetRecordingsResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveTranscript(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->retrieveTranscript(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MeetingSessionGetTranscriptResponse::class,
            $result
        );
    }
}
