<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Calls;

use Telnyx\AI\Assistants\Assistant;
use Telnyx\Calls\Actions\ActionAnswerParams\PreferredCodecs;
use Telnyx\Calls\Actions\ActionAnswerParams\Record;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordChannels;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordFormat;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrim;
use Telnyx\Calls\Actions\ActionAnswerParams\StreamTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\WebhookURLMethod;
use Telnyx\Calls\Actions\ActionAnswerResponse;
use Telnyx\Calls\Actions\ActionBridgeParams\MuteDtmf;
use Telnyx\Calls\Actions\ActionBridgeParams\Ringtone;
use Telnyx\Calls\Actions\ActionBridgeResponse;
use Telnyx\Calls\Actions\ActionEnqueueResponse;
use Telnyx\Calls\Actions\ActionGatherResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;
use Telnyx\Calls\Actions\ActionGatherUsingAIResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAudioResponse;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\Language;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\PayloadType;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\ServiceLevel;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakResponse;
use Telnyx\Calls\Actions\ActionHangupResponse;
use Telnyx\Calls\Actions\ActionLeaveQueueResponse;
use Telnyx\Calls\Actions\ActionPauseRecordingResponse;
use Telnyx\Calls\Actions\ActionReferResponse;
use Telnyx\Calls\Actions\ActionRejectParams\Cause;
use Telnyx\Calls\Actions\ActionRejectResponse;
use Telnyx\Calls\Actions\ActionResumeRecordingResponse;
use Telnyx\Calls\Actions\ActionSendDtmfResponse;
use Telnyx\Calls\Actions\ActionSendSipInfoResponse;
use Telnyx\Calls\Actions\ActionSpeakResponse;
use Telnyx\Calls\Actions\ActionStartAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStartForkingParams\StreamType;
use Telnyx\Calls\Actions\ActionStartForkingResponse;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\Direction;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngine;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStartPlaybackParams\AudioType;
use Telnyx\Calls\Actions\ActionStartPlaybackResponse;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Channels;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Format;
use Telnyx\Calls\Actions\ActionStartRecordingParams\RecordingTrack;
use Telnyx\Calls\Actions\ActionStartRecordingParams\TranscriptionLanguage;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Trim;
use Telnyx\Calls\Actions\ActionStartRecordingResponse;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SiprecTrack;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SipTransport;
use Telnyx\Calls\Actions\ActionStartSiprecResponse;
use Telnyx\Calls\Actions\ActionStartStreamingResponse;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Deepgram;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Telnyx;
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
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams\Role;
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleResponse;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\SipRegion;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateResponse;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Calls\Actions\InterruptionSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Calls\Actions\TranscriptionConfig;
use Telnyx\Calls\Actions\TranscriptionEngineAConfig;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig;
use Telnyx\Calls\Actions\TranscriptionStartRequest;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $billingGroupID Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param list<CustomSipHeader> $customHeaders custom headers to be added to the SIP INVITE response
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs the list of comma-separated codecs in a preferred order for the forked media to be received
     * @param Record|value-of<Record> $record Start recording automatically after an event. Disabled by default.
     * @param RecordChannels|value-of<RecordChannels> $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param RecordFormat|value-of<RecordFormat> $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param RecordTrack|value-of<RecordTrack> $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param RecordTrim|value-of<RecordTrim> $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param bool $sendSilenceWhenIdle generate silence RTP packets when no transmission available
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     * @param SoundModifications $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param StreamTrack|value-of<StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param bool $transcription Enable transcription upon call answer. The default value is false.
     * @param TranscriptionStartRequest $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        $billingGroupID = omit,
        $clientState = omit,
        $commandID = omit,
        $customHeaders = omit,
        $preferredCodecs = omit,
        $record = omit,
        $recordChannels = omit,
        $recordCustomFileName = omit,
        $recordFormat = omit,
        $recordMaxLength = omit,
        $recordTimeoutSecs = omit,
        $recordTrack = omit,
        $recordTrim = omit,
        $sendSilenceWhenIdle = omit,
        $sipHeaders = omit,
        $soundModifications = omit,
        $streamBidirectionalCodec = omit,
        $streamBidirectionalMode = omit,
        $streamBidirectionalTargetLegs = omit,
        $streamCodec = omit,
        $streamTrack = omit,
        $streamURL = omit,
        $transcription = omit,
        $transcriptionConfig = omit,
        $webhookURL = omit,
        $webhookURLMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionAnswerResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function answerRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionAnswerResponse;

    /**
     * @api
     *
     * @param string $callControlID1 the Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param bool $playRingtone specifies whether to play a ringtone if the call you want to bridge with has not yet been answered
     * @param string $queue The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     * @param \Telnyx\Calls\Actions\ActionBridgeParams\Record|value-of<\Telnyx\Calls\Actions\ActionBridgeParams\Record> $record Start recording automatically after an event. Disabled by default.
     * @param \Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels|value-of<\Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels> $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param \Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat|value-of<\Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat> $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param \Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack|value-of<\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack> $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param \Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim|value-of<\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim> $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param Ringtone|value-of<Ringtone> $ringtone Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     * @param string $videoRoomContext The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     * @param string $videoRoomID the ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlID,
        $callControlID1,
        $clientState = omit,
        $commandID = omit,
        $muteDtmf = omit,
        $parkAfterUnbridge = omit,
        $playRingtone = omit,
        $queue = omit,
        $record = omit,
        $recordChannels = omit,
        $recordCustomFileName = omit,
        $recordFormat = omit,
        $recordMaxLength = omit,
        $recordTimeoutSecs = omit,
        $recordTrack = omit,
        $recordTrim = omit,
        $ringtone = omit,
        $videoRoomContext = omit,
        $videoRoomID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionBridgeResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function bridgeRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionBridgeResponse;

    /**
     * @api
     *
     * @param string $queueName The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $maxSize The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     * @param int $maxWaitTimeSecs the number of seconds after which the call will be removed from the queue
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        $queueName,
        $clientState = omit,
        $commandID = omit,
        $maxSize = omit,
        $maxWaitTimeSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionEnqueueResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function enqueueRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnqueueResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $gatherID An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     * @param int $initialTimeoutMillis the number of milliseconds to wait for the first DTMF
     * @param int $interDigitTimeoutMillis the number of milliseconds to wait for input between digits
     * @param int $maximumDigits The maximum number of digits to fetch. This parameter has a maximum value of 128.
     * @param int $minimumDigits The minimum number of digits to fetch. This parameter has a minimum value of 1.
     * @param string $terminatingDigit the digit used to terminate input if fewer than `maximum_digits` digits have been gathered
     * @param int $timeoutMillis the number of milliseconds to wait to complete the request
     * @param string $validDigits a list of all digits accepted as valid
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $gatherID = omit,
        $initialTimeoutMillis = omit,
        $interDigitTimeoutMillis = omit,
        $maximumDigits = omit,
        $minimumDigits = omit,
        $terminatingDigit = omit,
        $timeoutMillis = omit,
        $validDigits = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function gatherRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherResponse;

    /**
     * @api
     *
     * @param mixed $parameters The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format
     * @param Assistant $assistant assistant configuration including choice of LLM, custom instructions, and tools
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param InterruptionSettings $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language Language to use for speech recognition
     * @param list<MessageHistory> $messageHistory the message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant
     * @param bool $sendMessageHistoryUpdates Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     * @param bool $sendPartialResults Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     * @param TranscriptionConfig $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param int $userResponseTimeoutMs the number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        $parameters,
        $assistant = omit,
        $clientState = omit,
        $commandID = omit,
        $greeting = omit,
        $interruptionSettings = omit,
        $language = omit,
        $messageHistory = omit,
        $sendMessageHistoryUpdates = omit,
        $sendPartialResults = omit,
        $transcription = omit,
        $userResponseTimeoutMs = omit,
        $voice = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAIResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function gatherUsingAIRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAIResponse;

    /**
     * @api
     *
     * @param string $audioURL The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $interDigitTimeoutMillis the number of milliseconds to wait for input between digits
     * @param string $invalidAudioURL The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     * @param string $invalidMediaName The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param int $maximumDigits The maximum number of digits to fetch. This parameter has a maximum value of 128.
     * @param int $maximumTries the maximum number of times the file should be played if there is no input from the user on the call
     * @param string $mediaName The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param int $minimumDigits The minimum number of digits to fetch. This parameter has a minimum value of 1.
     * @param string $terminatingDigit the digit used to terminate input if fewer than `maximum_digits` digits have been gathered
     * @param int $timeoutMillis the number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file
     * @param string $validDigits a list of all digits accepted as valid
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        $audioURL = omit,
        $clientState = omit,
        $commandID = omit,
        $interDigitTimeoutMillis = omit,
        $invalidAudioURL = omit,
        $invalidMediaName = omit,
        $maximumDigits = omit,
        $maximumTries = omit,
        $mediaName = omit,
        $minimumDigits = omit,
        $terminatingDigit = omit,
        $timeoutMillis = omit,
        $validDigits = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAudioResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function gatherUsingAudioRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAudioResponse;

    /**
     * @api
     *
     * @param string $payload The text or SSML to be converted into speech. There is a 3,000 character limit.
     * @param string $voice Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $interDigitTimeoutMillis the number of milliseconds to wait for input between digits
     * @param string $invalidPayload The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     * @param Language|value-of<Language> $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param int $maximumDigits The maximum number of digits to fetch. This parameter has a maximum value of 128.
     * @param int $maximumTries the maximum number of times that a file should be played back if there is no input from the user on the call
     * @param int $minimumDigits The minimum number of digits to fetch. This parameter has a minimum value of 1.
     * @param PayloadType|value-of<PayloadType> $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param ServiceLevel|value-of<ServiceLevel> $serviceLevel This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     * @param string $terminatingDigit the digit used to terminate input if fewer than `maximum_digits` digits have been gathered
     * @param int $timeoutMillis the number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file
     * @param string $validDigits a list of all digits accepted as valid
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        $payload,
        $voice,
        $clientState = omit,
        $commandID = omit,
        $interDigitTimeoutMillis = omit,
        $invalidPayload = omit,
        $language = omit,
        $maximumDigits = omit,
        $maximumTries = omit,
        $minimumDigits = omit,
        $payloadType = omit,
        $serviceLevel = omit,
        $terminatingDigit = omit,
        $timeoutMillis = omit,
        $validDigits = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingSpeakResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function gatherUsingSpeakRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingSpeakResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function hangupRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function leaveQueueRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function pauseRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse;

    /**
     * @api
     *
     * @param string $sipAddress the SIP URI to which the call will be referred to
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param list<CustomSipHeader> $customHeaders custom headers to be added to the SIP INVITE
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        $sipAddress,
        $clientState = omit,
        $commandID = omit,
        $customHeaders = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $sipHeaders = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionReferResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function referRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionReferResponse;

    /**
     * @api
     *
     * @param Cause|value-of<Cause> $cause cause for call rejection
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        $cause,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function rejectRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resumeRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse;

    /**
     * @api
     *
     * @param string $digits DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $durationMillis Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        $digits,
        $clientState = omit,
        $commandID = omit,
        $durationMillis = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionSendDtmfResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendDtmfRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendDtmfResponse;

    /**
     * @api
     *
     * @param string $body Content of the SIP INFO
     * @param string $contentType Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        $body,
        $contentType,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionSendSipInfoResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendSipInfoRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendSipInfoResponse;

    /**
     * @api
     *
     * @param string $payload The text or SSML to be converted into speech. There is a 3,000 character limit.
     * @param string $voice Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param \Telnyx\Calls\Actions\ActionSpeakParams\Language|value-of<\Telnyx\Calls\Actions\ActionSpeakParams\Language> $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param \Telnyx\Calls\Actions\ActionSpeakParams\PayloadType|value-of<\Telnyx\Calls\Actions\ActionSpeakParams\PayloadType> $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param \Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel|value-of<\Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel> $serviceLevel This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     * @param string $stop When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        $payload,
        $voice,
        $clientState = omit,
        $commandID = omit,
        $language = omit,
        $payloadType = omit,
        $serviceLevel = omit,
        $stop = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function speakRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param \Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant $assistant AI Assistant configuration
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param InterruptionSettings $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param TranscriptionConfig $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        $assistant = omit,
        $clientState = omit,
        $commandID = omit,
        $greeting = omit,
        $interruptionSettings = omit,
        $transcription = omit,
        $voice = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartAIAssistantResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startAIAssistantRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartAIAssistantResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $rx the network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded
     * @param StreamType|value-of<StreamType> $streamType Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     * @param string $tx the network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $rx = omit,
        $streamType = omit,
        $tx = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartForkingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startForkingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartForkingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param Direction|value-of<Direction> $direction the direction of the audio stream to be noise suppressed
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noiseSuppressionEngine The engine to use for noise suppression.
     * A - rnnoise engine
     * B - deepfilter engine.
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $direction = omit,
        $noiseSuppressionEngine = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startNoiseSuppressionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param AudioType|value-of<AudioType> $audioType specifies the type of audio provided in `audio_url` or `playback_content`
     * @param string $audioURL The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param bool $cacheAudio Caches the audio file. Useful when playing the same audio file multiple times during the call.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string|int $loop The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     * @param string $mediaName The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param bool $overlay When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     * @param string $playbackContent Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty
     * @param string $stop When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     * @param string $targetLegs Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        $audioType = omit,
        $audioURL = omit,
        $cacheAudio = omit,
        $clientState = omit,
        $commandID = omit,
        $loop = omit,
        $mediaName = omit,
        $overlay = omit,
        $playbackContent = omit,
        $stop = omit,
        $targetLegs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartPlaybackResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startPlaybackRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartPlaybackResponse;

    /**
     * @api
     *
     * @param Channels|value-of<Channels> $channels when `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B
     * @param Format|value-of<Format> $format The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $customFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param int $maxLength Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite)
     * @param bool $playBeep if enabled, a beep sound will be played at the start of a recording
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite)
     * @param bool $transcription Enable post recording transcription. The default value is false.
     * @param string $transcriptionEngine Engine to use for speech recognition. `A` - `Google`
     * @param TranscriptionLanguage|value-of<TranscriptionLanguage> $transcriptionLanguage Language to use for speech recognition
     * @param int $transcriptionMaxSpeakerCount Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     * @param int $transcriptionMinSpeakerCount Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     * @param bool $transcriptionProfanityFilter Enables profanity_filter. Applies to `google` engine only.
     * @param bool $transcriptionSpeakerDiarization Enables speaker diarization. Applies to `google` engine only.
     * @param Trim|value-of<Trim> $trim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        $channels,
        $format,
        $clientState = omit,
        $commandID = omit,
        $customFileName = omit,
        $maxLength = omit,
        $playBeep = omit,
        $recordingTrack = omit,
        $timeoutSecs = omit,
        $transcription = omit,
        $transcriptionEngine = omit,
        $transcriptionLanguage = omit,
        $transcriptionMaxSpeakerCount = omit,
        $transcriptionMinSpeakerCount = omit,
        $transcriptionProfanityFilter = omit,
        $transcriptionSpeakerDiarization = omit,
        $trim = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartRecordingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartRecordingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $connectorName name of configured SIPREC connector to be used
     * @param bool $includeMetadataCustomHeaders When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param bool $secure Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport specifies SIP transport protocol
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack specifies which track should be sent on siprec session
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        $clientState = omit,
        $connectorName = omit,
        $includeMetadataCustomHeaders = omit,
        $secure = omit,
        $sessionTimeoutSecs = omit,
        $sipTransport = omit,
        $siprecTrack = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartSiprecResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startSiprecRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartSiprecResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param DialogflowConfig $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param 8000|16000|22050|24000|48000 $streamBidirectionalSamplingRate audio sampling rate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param \Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack|value-of<\Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $dialogflowConfig = omit,
        $enableDialogflow = omit,
        $streamBidirectionalCodec = omit,
        $streamBidirectionalMode = omit,
        $streamBidirectionalSamplingRate = omit,
        $streamBidirectionalTargetLegs = omit,
        $streamCodec = omit,
        $streamTrack = omit,
        $streamURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startStreamingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     * @param Google|Telnyx|Deepgram|TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig
     * @param string $transcriptionTracks Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $transcriptionEngine = omit,
        $transcriptionEngineConfig = omit,
        $transcriptionTracks = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartTranscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startTranscriptionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartTranscriptionResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopAIAssistantRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param \Telnyx\Calls\Actions\ActionStopForkingParams\StreamType|value-of<\Telnyx\Calls\Actions\ActionStopForkingParams\StreamType> $streamType Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $streamType = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopForkingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopGatherRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopNoiseSuppressionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param bool $overlay when enabled, it stops the audio being played in the overlay queue
     * @param string $stop Use `current` to stop the current audio being played. Use `all` to stop the current audio file being played and clear all audio files from the queue.
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $overlay = omit,
        $stop = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopPlaybackResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopPlaybackRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopPlaybackResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopSiprecRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $streamID Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $streamID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopStreamingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function stopTranscriptionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse;

    /**
     * @api
     *
     * @param Role|value-of<Role> $role The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        $role,
        ?RequestOptions $requestOptions = null
    ): ActionSwitchSupervisorRoleResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function switchSupervisorRoleRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSwitchSupervisorRoleResponse;

    /**
     * @api
     *
     * @param string $to the DID or SIP URI to dial out to
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     * @param AnsweringMachineDetectionConfig $answeringMachineDetectionConfig optional configuration parameters to modify 'answering_machine_detection' performance
     * @param string $audioURL The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param list<CustomSipHeader> $customHeaders custom headers to be added to the SIP INVITE
     * @param bool $earlyMedia if set to false, early media will not be passed to the originating leg
     * @param string $from The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     * @param string $fromDisplayName The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption defines whether media should be encrypted on the new call leg
     * @param string $mediaName The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param \Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf|value-of<\Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf> $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param \Telnyx\Calls\Actions\ActionTransferParams\Record|value-of<\Telnyx\Calls\Actions\ActionTransferParams\Record> $record Start recording automatically after an event. Disabled by default.
     * @param \Telnyx\Calls\Actions\ActionTransferParams\RecordChannels|value-of<\Telnyx\Calls\Actions\ActionTransferParams\RecordChannels> $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param \Telnyx\Calls\Actions\ActionTransferParams\RecordFormat|value-of<\Telnyx\Calls\Actions\ActionTransferParams\RecordFormat> $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param \Telnyx\Calls\Actions\ActionTransferParams\RecordTrack|value-of<\Telnyx\Calls\Actions\ActionTransferParams\RecordTrack> $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param \Telnyx\Calls\Actions\ActionTransferParams\RecordTrim|value-of<\Telnyx\Calls\Actions\ActionTransferParams\RecordTrim> $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     * @param SipRegion|value-of<SipRegion> $sipRegion defines the SIP region to be used for the call
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param SoundModifications $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param string $targetLegClientState Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     * @param int $timeLimitSecs Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param \Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod|value-of<\Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        $to,
        $answeringMachineDetection = omit,
        $answeringMachineDetectionConfig = omit,
        $audioURL = omit,
        $clientState = omit,
        $commandID = omit,
        $customHeaders = omit,
        $earlyMedia = omit,
        $from = omit,
        $fromDisplayName = omit,
        $mediaEncryption = omit,
        $mediaName = omit,
        $muteDtmf = omit,
        $parkAfterUnbridge = omit,
        $record = omit,
        $recordChannels = omit,
        $recordCustomFileName = omit,
        $recordFormat = omit,
        $recordMaxLength = omit,
        $recordTimeoutSecs = omit,
        $recordTrack = omit,
        $recordTrim = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $sipHeaders = omit,
        $sipRegion = omit,
        $sipTransportProtocol = omit,
        $soundModifications = omit,
        $targetLegClientState = omit,
        $timeLimitSecs = omit,
        $timeoutSecs = omit,
        $webhookURL = omit,
        $webhookURLMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionTransferResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function transferRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionTransferResponse;

    /**
     * @api
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        $clientState,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateClientStateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateClientStateRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateClientStateResponse;
}
