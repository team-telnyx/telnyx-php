<?php

namespace Tests\Services\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesResponse;
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
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
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
    public function testAddAIAssistantMessages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->addAIAssistantMessages(
            'call_control_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionAddAIAssistantMessagesResponse::class,
            $result
        );
    }

    #[Test]
    public function testAnswer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->answer('call_control_id');

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
            callControlIDToBridgeWith: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
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
            callControlIDToBridgeWith: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            muteDtmf: 'opposite',
            parkAfterUnbridge: 'self',
            playRingtone: true,
            queue: 'support',
            record: 'record-from-answer',
            recordChannels: 'single',
            recordCustomFileName: 'my_recording_file_name',
            recordFormat: 'wav',
            recordMaxLength: 1000,
            recordTimeoutSecs: 100,
            recordTrack: 'outbound',
            recordTrim: 'trim-silence',
            ringtone: 'pl',
            videoRoomContext: 'Alice',
            videoRoomID: '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0',
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
            queueName: 'support'
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
            queueName: 'support',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            keepAfterHangup: true,
            maxSize: 20,
            maxWaitTimeSecs: 600,
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

        $result = $this->client->calls->actions->gather('call_control_id');

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
            parameters: ['properties' => 'bar', 'required' => 'bar', 'type' => 'bar'],
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
            parameters: ['properties' => 'bar', 'required' => 'bar', 'type' => 'bar'],
            assistant: [
                'instructions' => 'You are a friendly voice assistant.',
                'model' => 'Qwen/Qwen3-235B-A22B',
                'openaiAPIKeyRef' => 'my_openai_api_key',
                'tools' => [
                    [
                        'bookAppointment' => [
                            'apiKeyRef' => 'my_calcom_api_key',
                            'eventTypeID' => 0,
                            'attendeeName' => 'attendee_name',
                            'attendeeTimezone' => 'attendee_timezone',
                        ],
                        'type' => 'book_appointment',
                    ],
                ],
            ],
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            greeting: 'Hello, can you tell me your age and where you live?',
            interruptionSettings: ['enable' => true],
            language: GoogleTranscriptionLanguage::EN,
            messageHistory: [
                ['content' => 'Hello, what\'s your name?', 'role' => 'assistant'],
                ['content' => 'Hello, I\'m John.', 'role' => 'user'],
            ],
            sendMessageHistoryUpdates: true,
            sendPartialResults: true,
            transcription: ['model' => 'distil-whisper/distil-large-v2'],
            userResponseTimeoutMs: 5000,
            voice: 'Telnyx.KokoroTTS.af',
            voiceSettings: [
                'type' => 'elevenlabs', 'apiKeyRef' => 'my_elevenlabs_api_key',
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
            'call_control_id'
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
            payload: 'say this on call',
            voice: 'male'
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
            payload: 'say this on call',
            voice: 'male',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            interDigitTimeoutMillis: 10000,
            invalidPayload: 'say this on call',
            language: 'arb',
            maximumDigits: 10,
            maximumTries: 3,
            minimumDigits: 1,
            payloadType: 'text',
            serviceLevel: 'premium',
            terminatingDigit: '#',
            timeoutMillis: 60000,
            validDigits: '123',
            voiceSettings: [
                'type' => 'elevenlabs', 'apiKeyRef' => 'my_elevenlabs_api_key',
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

        $result = $this->client->calls->actions->hangup('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionHangupResponse::class, $result);
    }

    #[Test]
    public function testLeaveQueue(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->leaveQueue('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionLeaveQueueResponse::class, $result);
    }

    #[Test]
    public function testPauseRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->pauseRecording('call_control_id');

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
            sipAddress: 'sip:username@sip.non-telnyx-address.com'
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
            sipAddress: 'sip:username@sip.non-telnyx-address.com',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            customHeaders: [
                ['name' => 'head_1', 'value' => 'val_1'],
                ['name' => 'head_2', 'value' => 'val_2'],
            ],
            sipAuthPassword: 'sip_auth_password',
            sipAuthUsername: 'sip_auth_username',
            sipHeaders: [['name' => 'User-to-User', 'value' => 'value']],
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
            cause: 'USER_BUSY'
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
            cause: 'USER_BUSY',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
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

        $result = $this->client->calls->actions->resumeRecording('call_control_id');

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
            digits: '1www2WABCDw9'
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
            digits: '1www2WABCDw9',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            durationMillis: 500,
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
            body: '{"key": "value", "numValue": 100}',
            contentType: 'application/json',
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
            body: '{"key": "value", "numValue": 100}',
            contentType: 'application/json',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
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
            payload: 'Say this on the call',
            voice: 'female'
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
            payload: 'Say this on the call',
            voice: 'female',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            language: 'arb',
            payloadType: 'text',
            serviceLevel: 'basic',
            stop: 'current',
            voiceSettings: [
                'type' => 'elevenlabs', 'apiKeyRef' => 'my_elevenlabs_api_key',
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
            'call_control_id'
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

        $result = $this->client->calls->actions->startForking('call_control_id');

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
            'call_control_id'
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

        $result = $this->client->calls->actions->startPlayback('call_control_id');

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
            channels: 'single',
            format: 'wav'
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
            channels: 'single',
            format: 'wav',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            customFileName: 'my_recording_file_name',
            maxLength: 0,
            playBeep: true,
            recordingTrack: 'outbound',
            timeoutSecs: 0,
            transcription: true,
            transcriptionEngine: 'B',
            transcriptionLanguage: 'en-US',
            transcriptionMaxSpeakerCount: 4,
            transcriptionMinSpeakerCount: 4,
            transcriptionProfanityFilter: true,
            transcriptionSpeakerDiarization: true,
            trim: 'trim-silence',
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

        $result = $this->client->calls->actions->startSiprec('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStartSiprecResponse::class, $result);
    }

    #[Test]
    public function testStartStreaming(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->startStreaming('call_control_id');

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
            'call_control_id'
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

        $result = $this->client->calls->actions->stopAIAssistant('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopAIAssistantResponse::class, $result);
    }

    #[Test]
    public function testStopForking(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopForking('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopForkingResponse::class, $result);
    }

    #[Test]
    public function testStopGather(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopGather('call_control_id');

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
            'call_control_id'
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

        $result = $this->client->calls->actions->stopPlayback('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopPlaybackResponse::class, $result);
    }

    #[Test]
    public function testStopRecording(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopRecording('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopRecordingResponse::class, $result);
    }

    #[Test]
    public function testStopSiprec(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopSiprec('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionStopSiprecResponse::class, $result);
    }

    #[Test]
    public function testStopStreaming(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->actions->stopStreaming('call_control_id');

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
            'call_control_id'
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
            role: 'barge'
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
            role: 'barge'
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
            to: '+18005550100 or sip:username@sip.telnyx.com'
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
            to: '+18005550100 or sip:username@sip.telnyx.com',
            answeringMachineDetection: 'detect',
            answeringMachineDetectionConfig: [
                'afterGreetingSilenceMillis' => 1000,
                'betweenWordsSilenceMillis' => 1000,
                'greetingDurationMillis' => 1000,
                'greetingSilenceDurationMillis' => 2000,
                'greetingTotalAnalysisTimeMillis' => 50000,
                'initialSilenceMillis' => 1000,
                'maximumNumberOfWords' => 1000,
                'maximumWordLengthMillis' => 2000,
                'silenceThreshold' => 512,
                'totalAnalysisTimeMillis' => 5000,
            ],
            audioURL: 'http://www.example.com/sounds/greeting.wav',
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            commandID: '891510ac-f3e4-11e8-af5b-de00688a4901',
            customHeaders: [
                ['name' => 'head_1', 'value' => 'val_1'],
                ['name' => 'head_2', 'value' => 'val_2'],
            ],
            earlyMedia: true,
            from: '+18005550101',
            fromDisplayName: 'Company Name',
            mediaEncryption: 'SRTP',
            mediaName: 'my_media_uploaded_to_media_storage_api',
            muteDtmf: 'opposite',
            parkAfterUnbridge: 'self',
            record: 'record-from-answer',
            recordChannels: 'single',
            recordCustomFileName: 'my_recording_file_name',
            recordFormat: 'wav',
            recordMaxLength: 1000,
            recordTimeoutSecs: 100,
            recordTrack: 'outbound',
            recordTrim: 'trim-silence',
            sipAuthPassword: 'password',
            sipAuthUsername: 'username',
            sipHeaders: [['name' => 'User-to-User', 'value' => 'value']],
            sipRegion: 'Canada',
            sipTransportProtocol: 'TLS',
            soundModifications: [
                'octaves' => 0.1, 'pitch' => 0.8, 'semitone' => -2, 'track' => 'both',
            ],
            targetLegClientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            timeLimitSecs: 600,
            timeoutSecs: 60,
            webhookURL: 'https://www.example.com/server-b/',
            webhookURLMethod: 'POST',
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
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d'
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
            clientState: 'aGF2ZSBhIG5pY2UgZGF5ID1d'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUpdateClientStateResponse::class, $result);
    }
}
