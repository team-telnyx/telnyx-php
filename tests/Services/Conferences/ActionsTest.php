<?php

namespace Tests\Services\Conferences;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Conferences\Actions\ActionHoldResponse;
use Telnyx\Conferences\Actions\ActionJoinResponse;
use Telnyx\Conferences\Actions\ActionLeaveResponse;
use Telnyx\Conferences\Actions\ActionMuteResponse;
use Telnyx\Conferences\Actions\ActionPlayResponse;
use Telnyx\Conferences\Actions\ActionRecordPauseResponse;
use Telnyx\Conferences\Actions\ActionRecordResumeResponse;
use Telnyx\Conferences\Actions\ActionRecordStartResponse;
use Telnyx\Conferences\Actions\ActionRecordStopResponse;
use Telnyx\Conferences\Actions\ActionSpeakResponse;
use Telnyx\Conferences\Actions\ActionStopResponse;
use Telnyx\Conferences\Actions\ActionUnholdResponse;
use Telnyx\Conferences\Actions\ActionUnmuteResponse;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->update(
            'id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                'supervisor_role' => 'whisper',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->update(
            'id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                'supervisor_role' => 'whisper',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'region' => 'US',
                'whisper_call_control_ids' => [
                    'v2:Sg1xxxQ_U3ixxxyXT_VDNI3xxxazZdg6Vxxxs4-GNYxxxVaJPOhFMRQ',
                    'v2:qqpb0mmvd-ovhhBr0BUQQn0fld5jIboaaX3-De0DkqXHzbf8d75xkw',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUpdateResponse::class, $result);
    }

    #[Test]
    public function testHold(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->hold('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionHoldResponse::class, $result);
    }

    #[Test]
    public function testJoin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->join(
            'id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionJoinResponse::class, $result);
    }

    #[Test]
    public function testJoinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->join(
            'id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                'beep_enabled' => 'always',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'end_conference_on_exit' => true,
                'hold' => true,
                'hold_audio_url' => 'http://www.example.com/audio.wav',
                'hold_media_name' => 'my_media_uploaded_to_media_storage_api',
                'mute' => true,
                'region' => 'US',
                'soft_end_conference_on_exit' => true,
                'start_conference_on_enter' => true,
                'supervisor_role' => 'whisper',
                'whisper_call_control_ids' => [
                    'v2:Sg1xxxQ_U3ixxxyXT_VDNI3xxxazZdg6Vxxxs4-GNYxxxVaJPOhFMRQ',
                    'v2:qqpb0mmvd-ovhhBr0BUQQn0fld5jIboaaX3-De0DkqXHzbf8d75xkw',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionJoinResponse::class, $result);
    }

    #[Test]
    public function testLeave(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->leave(
            'id',
            ['call_control_id' => 'c46e06d7-b78f-4b13-96b6-c576af9640ff']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionLeaveResponse::class, $result);
    }

    #[Test]
    public function testLeaveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->leave(
            'id',
            [
                'call_control_id' => 'c46e06d7-b78f-4b13-96b6-c576af9640ff',
                'beep_enabled' => 'never',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'region' => 'US',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionLeaveResponse::class, $result);
    }

    #[Test]
    public function testMute(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->mute('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionMuteResponse::class, $result);
    }

    #[Test]
    public function testPlay(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->play('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionPlayResponse::class, $result);
    }

    #[Test]
    public function testRecordPause(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->recordPause('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRecordPauseResponse::class, $result);
    }

    #[Test]
    public function testRecordResume(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->recordResume('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRecordResumeResponse::class, $result);
    }

    #[Test]
    public function testRecordStart(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->recordStart(
            'id',
            ['format' => 'wav']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRecordStartResponse::class, $result);
    }

    #[Test]
    public function testRecordStartWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->recordStart(
            'id',
            [
                'format' => 'wav',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'custom_file_name' => 'my_recording_file_name',
                'play_beep' => true,
                'region' => 'US',
                'trim' => 'trim-silence',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRecordStartResponse::class, $result);
    }

    #[Test]
    public function testRecordStop(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->recordStop('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRecordStopResponse::class, $result);
    }

    #[Test]
    public function testSpeak(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->speak(
            'id',
            ['payload' => 'Say this to participants', 'voice' => 'female']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSpeakResponse::class, $result);
    }

    #[Test]
    public function testSpeakWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->speak(
            'id',
            [
                'payload' => 'Say this to participants',
                'voice' => 'female',
                'call_control_ids' => [
                    'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                ],
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'language' => 'en-US',
                'payload_type' => 'text',
                'region' => 'US',
                'voice_settings' => [
                    'type' => 'elevenlabs', 'api_key_ref' => 'my_elevenlabs_api_key',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSpeakResponse::class, $result);
    }

    #[Test]
    public function testStop(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->stop('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopResponse::class, $result);
    }

    #[Test]
    public function testUnhold(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->unhold(
            'id',
            [
                'call_control_ids' => [
                    'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUnholdResponse::class, $result);
    }

    #[Test]
    public function testUnholdWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->unhold(
            'id',
            [
                'call_control_ids' => [
                    'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                ],
                'region' => 'US',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUnholdResponse::class, $result);
    }

    #[Test]
    public function testUnmute(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conferences->actions->unmute('id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUnmuteResponse::class, $result);
    }
}
