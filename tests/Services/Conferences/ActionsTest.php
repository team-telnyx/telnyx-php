<?php

namespace Tests\Services\Conferences;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->conferences->actions->update(
            'id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            supervisorRole: 'whisper',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->update(
            'id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            supervisorRole: 'whisper',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testHold(): void
    {
        $result = $this->client->conferences->actions->hold('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testJoin(): void
    {
        $result = $this->client->conferences->actions->join(
            'id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testJoinWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->join(
            'id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testLeave(): void
    {
        $result = $this->client->conferences->actions->leave(
            'id',
            callControlID: 'c46e06d7-b78f-4b13-96b6-c576af9640ff'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testLeaveWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->leave(
            'id',
            callControlID: 'c46e06d7-b78f-4b13-96b6-c576af9640ff'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testMute(): void
    {
        $result = $this->client->conferences->actions->mute('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPlay(): void
    {
        $result = $this->client->conferences->actions->play('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordPause(): void
    {
        $result = $this->client->conferences->actions->recordPause('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordResume(): void
    {
        $result = $this->client->conferences->actions->recordResume('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordStart(): void
    {
        $result = $this->client->conferences->actions->recordStart(
            'id',
            format: 'wav'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordStartWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->recordStart(
            'id',
            format: 'wav'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordStop(): void
    {
        $result = $this->client->conferences->actions->recordStop('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSpeak(): void
    {
        $result = $this->client->conferences->actions->speak(
            'id',
            payload: 'Say this to participants',
            voice: 'female'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSpeakWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->speak(
            'id',
            payload: 'Say this to participants',
            voice: 'female'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStop(): void
    {
        $result = $this->client->conferences->actions->stop('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnhold(): void
    {
        $result = $this->client->conferences->actions->unhold(
            'id',
            ['v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnholdWithOptionalParams(): void
    {
        $result = $this->client->conferences->actions->unhold(
            'id',
            ['v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnmute(): void
    {
        $result = $this->client->conferences->actions->unmute('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
