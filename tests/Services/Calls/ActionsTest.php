<?php

namespace Tests\Services\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Calls\Actions\ActionAnswerResponse;
use Telnyx\Calls\Actions\ActionBridgeResponse;
use Telnyx\Calls\Actions\ActionEnqueueResponse;
use Telnyx\Calls\Actions\ActionGatherResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAIResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAudioResponse;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakResponse;
use Telnyx\Calls\Actions\ActionHangupResponse;
use Telnyx\Calls\Actions\ActionLeaveQueueResponse;
use Telnyx\Calls\Actions\ActionPauseRecordingResponse;
use Telnyx\Calls\Actions\ActionReferResponse;
use Telnyx\Calls\Actions\ActionRejectResponse;
use Telnyx\Calls\Actions\ActionResumeRecordingResponse;
use Telnyx\Calls\Actions\ActionSendDtmfResponse;
use Telnyx\Calls\Actions\ActionSendSipInfoResponse;
use Telnyx\Calls\Actions\ActionSpeakResponse;
use Telnyx\Calls\Actions\ActionStartAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStartForkingResponse;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStartPlaybackResponse;
use Telnyx\Calls\Actions\ActionStartRecordingResponse;
use Telnyx\Calls\Actions\ActionStartSiprecResponse;
use Telnyx\Calls\Actions\ActionStartStreamingResponse;
use Telnyx\Calls\Actions\ActionStartTranscriptionResponse;
use Telnyx\Calls\Actions\ActionStopAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStopForkingResponse;
use Telnyx\Calls\Actions\ActionStopGatherResponse;
use Telnyx\Calls\Actions\ActionStopNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStopPlaybackResponse;
use Telnyx\Calls\Actions\ActionStopRecordingResponse;
use Telnyx\Calls\Actions\ActionStopSiprecResponse;
use Telnyx\Calls\Actions\ActionStopStreamingResponse;
use Telnyx\Calls\Actions\ActionStopTranscriptionResponse;
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleResponse;
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateResponse;
use Telnyx\Client;
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
    public function testAnswer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->answer('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionAnswerResponse::class, $result);
    }

    #[Test]
    public function testBridge(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->bridge(
            'call_control_id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionBridgeResponse::class, $result);
    }

    #[Test]
    public function testBridgeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->bridge(
            'call_control_id',
            [
                'call_control_id' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'mute_dtmf' => 'opposite',
                'park_after_unbridge' => 'self',
                'play_ringtone' => true,
                'queue' => 'support',
                'record' => 'record-from-answer',
                'record_channels' => 'single',
                'record_custom_file_name' => 'my_recording_file_name',
                'record_format' => 'wav',
                'record_max_length' => 1000,
                'record_timeout_secs' => 100,
                'record_track' => 'outbound',
                'record_trim' => 'trim-silence',
                'ringtone' => 'pl',
                'video_room_context' => 'Alice',
                'video_room_id' => '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionBridgeResponse::class, $result);
    }

    #[Test]
    public function testEnqueue(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->enqueue(
            'call_control_id',
            ['queue_name' => 'support']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionEnqueueResponse::class, $result);
    }

    #[Test]
    public function testEnqueueWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->enqueue(
            'call_control_id',
            [
                'queue_name' => 'support',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'keep_after_hangup' => true,
                'max_size' => 20,
                'max_wait_time_secs' => 600,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionEnqueueResponse::class, $result);
    }

    #[Test]
    public function testGather(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gather('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherResponse::class, $result);
    }

    #[Test]
    public function testGatherUsingAI(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gatherUsingAI(
            'call_control_id',
            [
                'parameters' => [
                    'properties' => [
                        'age' => [
                            'description' => 'The age of the customer.', 'type' => 'integer',
                        ],
                        'location' => [
                            'description' => 'The location of the customer.',
                            'type' => 'string',
                        ],
                    ],
                    'required' => ['age', 'location'],
                    'type' => 'object',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherUsingAIResponse::class, $result);
    }

    #[Test]
    public function testGatherUsingAIWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gatherUsingAI(
            'call_control_id',
            [
                'parameters' => [
                    'properties' => [
                        'age' => [
                            'description' => 'The age of the customer.', 'type' => 'integer',
                        ],
                        'location' => [
                            'description' => 'The location of the customer.',
                            'type' => 'string',
                        ],
                    ],
                    'required' => ['age', 'location'],
                    'type' => 'object',
                ],
                'assistant' => [
                    'instructions' => 'You are a friendly voice assistant.',
                    'model' => 'meta-llama/Meta-Llama-3.1-70B-Instruct',
                    'openai_api_key_ref' => 'my_openai_api_key',
                    'tools' => [
                        [
                            'book_appointment' => [
                                'api_key_ref' => 'my_calcom_api_key',
                                'event_type_id' => 0,
                                'attendee_name' => 'attendee_name',
                                'attendee_timezone' => 'attendee_timezone',
                            ],
                            'type' => 'book_appointment',
                        ],
                    ],
                ],
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'greeting' => 'Hello, can you tell me your age and where you live?',
                'interruption_settings' => ['enable' => true],
                'language' => 'en',
                'message_history' => [
                    ['content' => 'Hello, what\'s your name?', 'role' => 'assistant'],
                    ['content' => 'Hello, I\'m John.', 'role' => 'user'],
                ],
                'send_message_history_updates' => true,
                'send_partial_results' => true,
                'transcription' => ['model' => 'distil-whisper/distil-large-v2'],
                'user_response_timeout_ms' => 5000,
                'voice' => 'Telnyx.KokoroTTS.af',
                'voice_settings' => ['api_key_ref' => 'my_elevenlabs_api_key'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherUsingAIResponse::class, $result);
    }

    #[Test]
    public function testGatherUsingAudio(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gatherUsingAudio(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherUsingAudioResponse::class, $result);
    }

    #[Test]
    public function testGatherUsingSpeak(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gatherUsingSpeak(
            'call_control_id',
            ['payload' => 'say this on call', 'voice' => 'male']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherUsingSpeakResponse::class, $result);
    }

    #[Test]
    public function testGatherUsingSpeakWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->gatherUsingSpeak(
            'call_control_id',
            [
                'payload' => 'say this on call',
                'voice' => 'male',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'inter_digit_timeout_millis' => 10000,
                'invalid_payload' => 'say this on call',
                'language' => 'arb',
                'maximum_digits' => 10,
                'maximum_tries' => 3,
                'minimum_digits' => 1,
                'payload_type' => 'text',
                'service_level' => 'premium',
                'terminating_digit' => '#',
                'timeout_millis' => 60000,
                'valid_digits' => '123',
                'voice_settings' => ['api_key_ref' => 'my_elevenlabs_api_key'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGatherUsingSpeakResponse::class, $result);
    }

    #[Test]
    public function testHangup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->hangup('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionHangupResponse::class, $result);
    }

    #[Test]
    public function testLeaveQueue(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->leaveQueue('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionLeaveQueueResponse::class, $result);
    }

    #[Test]
    public function testPauseRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->pauseRecording(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionPauseRecordingResponse::class, $result);
    }

    #[Test]
    public function testRefer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->refer(
            'call_control_id',
            ['sip_address' => 'sip:username@sip.non-telnyx-address.com'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionReferResponse::class, $result);
    }

    #[Test]
    public function testReferWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->refer(
            'call_control_id',
            [
                'sip_address' => 'sip:username@sip.non-telnyx-address.com',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'custom_headers' => [
                    ['name' => 'head_1', 'value' => 'val_1'],
                    ['name' => 'head_2', 'value' => 'val_2'],
                ],
                'sip_auth_password' => 'sip_auth_password',
                'sip_auth_username' => 'sip_auth_username',
                'sip_headers' => [['name' => 'User-to-User', 'value' => 'value']],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionReferResponse::class, $result);
    }

    #[Test]
    public function testReject(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->reject(
            'call_control_id',
            ['cause' => 'USER_BUSY']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRejectResponse::class, $result);
    }

    #[Test]
    public function testRejectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->reject(
            'call_control_id',
            [
                'cause' => 'USER_BUSY',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionRejectResponse::class, $result);
    }

    #[Test]
    public function testResumeRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->resumeRecording(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionResumeRecordingResponse::class, $result);
    }

    #[Test]
    public function testSendDtmf(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->sendDtmf(
            'call_control_id',
            ['digits' => '1www2WABCDw9']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSendDtmfResponse::class, $result);
    }

    #[Test]
    public function testSendDtmfWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->sendDtmf(
            'call_control_id',
            [
                'digits' => '1www2WABCDw9',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'duration_millis' => 500,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSendDtmfResponse::class, $result);
    }

    #[Test]
    public function testSendSipInfo(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->sendSipInfo(
            'call_control_id',
            [
                'body' => '{"key": "value", "numValue": 100}',
                'content_type' => 'application/json',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSendSipInfoResponse::class, $result);
    }

    #[Test]
    public function testSendSipInfoWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->sendSipInfo(
            'call_control_id',
            [
                'body' => '{"key": "value", "numValue": 100}',
                'content_type' => 'application/json',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSendSipInfoResponse::class, $result);
    }

    #[Test]
    public function testSpeak(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->speak(
            'call_control_id',
            ['payload' => 'Say this on the call', 'voice' => 'female'],
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

        $result = $this->client->calls->actions->speak(
            'call_control_id',
            [
                'payload' => 'Say this on the call',
                'voice' => 'female',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'language' => 'arb',
                'payload_type' => 'text',
                'service_level' => 'basic',
                'stop' => 'current',
                'voice_settings' => ['api_key_ref' => 'my_elevenlabs_api_key'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSpeakResponse::class, $result);
    }

    #[Test]
    public function testStartAIAssistant(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startAIAssistant(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartAIAssistantResponse::class, $result);
    }

    #[Test]
    public function testStartForking(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startForking(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartForkingResponse::class, $result);
    }

    #[Test]
    public function testStartNoiseSuppression(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startNoiseSuppression(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionStartNoiseSuppressionResponse::class,
            $result
        );
    }

    #[Test]
    public function testStartPlayback(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startPlayback(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartPlaybackResponse::class, $result);
    }

    #[Test]
    public function testStartRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startRecording(
            'call_control_id',
            ['channels' => 'single', 'format' => 'wav']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartRecordingResponse::class, $result);
    }

    #[Test]
    public function testStartRecordingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startRecording(
            'call_control_id',
            [
                'channels' => 'single',
                'format' => 'wav',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'custom_file_name' => 'my_recording_file_name',
                'max_length' => 0,
                'play_beep' => true,
                'recording_track' => 'outbound',
                'timeout_secs' => 0,
                'transcription' => true,
                'transcription_engine' => 'B',
                'transcription_language' => 'en-US',
                'transcription_max_speaker_count' => 4,
                'transcription_min_speaker_count' => 4,
                'transcription_profanity_filter' => true,
                'transcription_speaker_diarization' => true,
                'trim' => 'trim-silence',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartRecordingResponse::class, $result);
    }

    #[Test]
    public function testStartSiprec(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startSiprec('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartSiprecResponse::class, $result);
    }

    #[Test]
    public function testStartStreaming(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startStreaming(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartStreamingResponse::class, $result);
    }

    #[Test]
    public function testStartTranscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startTranscription(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartTranscriptionResponse::class, $result);
    }

    #[Test]
    public function testStopAIAssistant(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopAIAssistant(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopAIAssistantResponse::class, $result);
    }

    #[Test]
    public function testStopForking(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopForking('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopForkingResponse::class, $result);
    }

    #[Test]
    public function testStopGather(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopGather('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopGatherResponse::class, $result);
    }

    #[Test]
    public function testStopNoiseSuppression(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopNoiseSuppression(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopNoiseSuppressionResponse::class, $result);
    }

    #[Test]
    public function testStopPlayback(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopPlayback(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopPlaybackResponse::class, $result);
    }

    #[Test]
    public function testStopRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopRecording(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopRecordingResponse::class, $result);
    }

    #[Test]
    public function testStopSiprec(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopSiprec('call_control_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopSiprecResponse::class, $result);
    }

    #[Test]
    public function testStopStreaming(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopStreaming(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopStreamingResponse::class, $result);
    }

    #[Test]
    public function testStopTranscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopTranscription(
            'call_control_id',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopTranscriptionResponse::class, $result);
    }

    #[Test]
    public function testSwitchSupervisorRole(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->switchSupervisorRole(
            'call_control_id',
            ['role' => 'barge']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSwitchSupervisorRoleResponse::class, $result);
    }

    #[Test]
    public function testSwitchSupervisorRoleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->switchSupervisorRole(
            'call_control_id',
            ['role' => 'barge']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSwitchSupervisorRoleResponse::class, $result);
    }

    #[Test]
    public function testTransfer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->transfer(
            'call_control_id',
            ['to' => '+18005550100 or sip:username@sip.telnyx.com']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionTransferResponse::class, $result);
    }

    #[Test]
    public function testTransferWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->transfer(
            'call_control_id',
            [
                'to' => '+18005550100 or sip:username@sip.telnyx.com',
                'answering_machine_detection' => 'detect',
                'answering_machine_detection_config' => [
                    'after_greeting_silence_millis' => 1000,
                    'between_words_silence_millis' => 1000,
                    'greeting_duration_millis' => 1000,
                    'greeting_silence_duration_millis' => 2000,
                    'greeting_total_analysis_time_millis' => 50000,
                    'initial_silence_millis' => 1000,
                    'maximum_number_of_words' => 1000,
                    'maximum_word_length_millis' => 2000,
                    'silence_threshold' => 512,
                    'total_analysis_time_millis' => 5000,
                ],
                'audio_url' => 'http://www.example.com/sounds/greeting.wav',
                'client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'command_id' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'custom_headers' => [
                    ['name' => 'head_1', 'value' => 'val_1'],
                    ['name' => 'head_2', 'value' => 'val_2'],
                ],
                'early_media' => true,
                'from' => '+18005550101',
                'from_display_name' => 'Company Name',
                'media_encryption' => 'SRTP',
                'media_name' => 'my_media_uploaded_to_media_storage_api',
                'mute_dtmf' => 'opposite',
                'park_after_unbridge' => 'self',
                'record' => 'record-from-answer',
                'record_channels' => 'single',
                'record_custom_file_name' => 'my_recording_file_name',
                'record_format' => 'wav',
                'record_max_length' => 1000,
                'record_timeout_secs' => 100,
                'record_track' => 'outbound',
                'record_trim' => 'trim-silence',
                'sip_auth_password' => 'password',
                'sip_auth_username' => 'username',
                'sip_headers' => [['name' => 'User-to-User', 'value' => 'value']],
                'sip_region' => 'Canada',
                'sip_transport_protocol' => 'TLS',
                'sound_modifications' => [
                    'octaves' => 0.1, 'pitch' => 0, 'semitone' => -2, 'track' => 'both',
                ],
                'target_leg_client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'time_limit_secs' => 600,
                'timeout_secs' => 60,
                'webhook_url' => 'https://www.example.com/server-b/',
                'webhook_url_method' => 'POST',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionTransferResponse::class, $result);
    }

    #[Test]
    public function testUpdateClientState(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->updateClientState(
            'call_control_id',
            ['client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUpdateClientStateResponse::class, $result);
    }

    #[Test]
    public function testUpdateClientStateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->updateClientState(
            'call_control_id',
            ['client_state' => 'aGF2ZSBhIG5pY2UgZGF5ID1d']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUpdateClientStateResponse::class, $result);
    }
}
