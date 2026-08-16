<?php

namespace Tests\Services\MeetingSessions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\Artifacts\ArtifactListResponse;
use Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifactResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ArtifactsTest extends TestCase
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

        $result = $this->client->meetingSessions->artifacts->create(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            type: 'summary'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionArtifactResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->artifacts->create(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
            type: 'summary'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionArtifactResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->artifacts->retrieve(
            'mtgart_b2c3d4e5-f6a7-8901-bcde-f23456789012',
            id: 'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionArtifactResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->artifacts->retrieve(
            'mtgart_b2c3d4e5-f6a7-8901-bcde-f23456789012',
            id: 'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MeetingSessionArtifactResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->meetingSessions->artifacts->list(
            'mtgsess_a1b2c3d4-e5f6-7890-abcd-ef1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtifactListResponse::class, $result);
    }
}
