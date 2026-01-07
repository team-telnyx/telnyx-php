<?php

declare(strict_types=1);

namespace Telnyx\Services\Calls;

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
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;
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
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova3Config;
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
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Calls\Actions\InterruptionSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Calls\Actions\TranscriptionConfig;
use Telnyx\Calls\Actions\TranscriptionEngineAConfig;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig;
use Telnyx\Calls\Actions\TranscriptionEngineGoogleConfig;
use Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig;
use Telnyx\Calls\Actions\TranscriptionStartRequest;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Calls\ActionsContract;

/**
 * @phpstan-import-type TranscriptionStartRequestShape from \Telnyx\Calls\Actions\TranscriptionStartRequest
 * @phpstan-import-type AssistantShape from \Telnyx\AI\Assistants\Assistant
 * @phpstan-import-type MessageHistoryShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings as VoiceSettingsShape1
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionSpeakParams\VoiceSettings as VoiceSettingsShape2
 * @phpstan-import-type AssistantShape from \Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant as AssistantShape1
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings as VoiceSettingsShape3
 * @phpstan-import-type NoiseSuppressionEngineConfigShape from \Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig
 * @phpstan-import-type LoopcountShape from \Telnyx\Calls\Actions\Loopcount
 * @phpstan-import-type DialogflowConfigShape from \Telnyx\Calls\DialogflowConfig
 * @phpstan-import-type TranscriptionEngineConfigShape from \Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig
 * @phpstan-import-type AnsweringMachineDetectionConfigShape from \Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetectionConfig
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 * @phpstan-import-type SoundModificationsShape from \Telnyx\Calls\SoundModifications
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 * @phpstan-import-type InterruptionSettingsShape from \Telnyx\Calls\Actions\InterruptionSettings
 * @phpstan-import-type TranscriptionConfigShape from \Telnyx\Calls\Actions\TranscriptionConfig
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Answer an incoming call. You must issue this command before executing subsequent commands on an incoming call.
     *
     * **Expected Webhooks:**
     *
     * - `call.answered`
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $billingGroupID Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders custom headers to be added to the SIP INVITE response
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
     * @param list<SipHeader|SipHeaderShape> $sipHeaders SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     * @param SoundModifications|SoundModificationsShape $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param StreamTrack|value-of<StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param bool $transcription Enable transcription upon call answer. The default value is false.
     * @param TranscriptionStartRequest|TranscriptionStartRequestShape $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        ?string $billingGroupID = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        PreferredCodecs|string|null $preferredCodecs = null,
        Record|string|null $record = null,
        RecordChannels|string $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        RecordFormat|string $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        RecordTrack|string $recordTrack = 'both',
        RecordTrim|string|null $recordTrim = null,
        bool $sendSilenceWhenIdle = false,
        ?array $sipHeaders = null,
        SoundModifications|array|null $soundModifications = null,
        StreamBidirectionalCodec|string $streamBidirectionalCodec = 'PCMU',
        StreamBidirectionalMode|string $streamBidirectionalMode = 'mp3',
        StreamBidirectionalTargetLegs|string $streamBidirectionalTargetLegs = 'opposite',
        StreamCodec|string $streamCodec = 'default',
        StreamTrack|string $streamTrack = 'inbound_track',
        ?string $streamURL = null,
        bool $transcription = false,
        TranscriptionStartRequest|array|null $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string $webhookURLMethod = 'POST',
        RequestOptions|array|null $requestOptions = null,
    ): ActionAnswerResponse {
        $params = Util::removeNulls(
            [
                'billingGroupID' => $billingGroupID,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'customHeaders' => $customHeaders,
                'preferredCodecs' => $preferredCodecs,
                'record' => $record,
                'recordChannels' => $recordChannels,
                'recordCustomFileName' => $recordCustomFileName,
                'recordFormat' => $recordFormat,
                'recordMaxLength' => $recordMaxLength,
                'recordTimeoutSecs' => $recordTimeoutSecs,
                'recordTrack' => $recordTrack,
                'recordTrim' => $recordTrim,
                'sendSilenceWhenIdle' => $sendSilenceWhenIdle,
                'sipHeaders' => $sipHeaders,
                'soundModifications' => $soundModifications,
                'streamBidirectionalCodec' => $streamBidirectionalCodec,
                'streamBidirectionalMode' => $streamBidirectionalMode,
                'streamBidirectionalTargetLegs' => $streamBidirectionalTargetLegs,
                'streamCodec' => $streamCodec,
                'streamTrack' => $streamTrack,
                'streamURL' => $streamURL,
                'transcription' => $transcription,
                'transcriptionConfig' => $transcriptionConfig,
                'webhookURL' => $webhookURL,
                'webhookURLMethod' => $webhookURLMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->answer($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Bridge two call control calls.
     *
     * **Expected Webhooks:**
     *
     * - `call.bridged` for Leg A
     * - `call.bridged` for Leg B
     *
     * @param string $callControlIDToBridge Unique identifier and token for controlling the call
     * @param string $callControlIDToBridgeWith the Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlIDToBridge,
        string $callControlIDToBridgeWith,
        ?string $clientState = null,
        ?string $commandID = null,
        MuteDtmf|string $muteDtmf = 'none',
        ?string $parkAfterUnbridge = null,
        bool $playRingtone = false,
        ?string $queue = null,
        \Telnyx\Calls\Actions\ActionBridgeParams\Record|string|null $record = null,
        \Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels|string $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        \Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat|string $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        \Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack|string $recordTrack = 'both',
        \Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim|string|null $recordTrim = null,
        Ringtone|string $ringtone = 'us',
        ?string $videoRoomContext = null,
        ?string $videoRoomID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionBridgeResponse {
        $params = Util::removeNulls(
            [
                'callControlIDToBridgeWith' => $callControlIDToBridgeWith,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'muteDtmf' => $muteDtmf,
                'parkAfterUnbridge' => $parkAfterUnbridge,
                'playRingtone' => $playRingtone,
                'queue' => $queue,
                'record' => $record,
                'recordChannels' => $recordChannels,
                'recordCustomFileName' => $recordCustomFileName,
                'recordFormat' => $recordFormat,
                'recordMaxLength' => $recordMaxLength,
                'recordTimeoutSecs' => $recordTimeoutSecs,
                'recordTrack' => $recordTrack,
                'recordTrim' => $recordTrim,
                'ringtone' => $ringtone,
                'videoRoomContext' => $videoRoomContext,
                'videoRoomID' => $videoRoomID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bridge($callControlIDToBridge, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Put the call in a queue.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $queueName The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param bool $keepAfterHangup If set to true, the call will remain in the queue after hangup. In this case bridging to such call will fail with necessary information needed to re-establish the call.
     * @param int $maxSize The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     * @param int $maxWaitTimeSecs the number of seconds after which the call will be removed from the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        string $queueName,
        ?string $clientState = null,
        ?string $commandID = null,
        bool $keepAfterHangup = false,
        int $maxSize = 100,
        ?int $maxWaitTimeSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionEnqueueResponse {
        $params = Util::removeNulls(
            [
                'queueName' => $queueName,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'keepAfterHangup' => $keepAfterHangup,
                'maxSize' => $maxSize,
                'maxWaitTimeSecs' => $maxWaitTimeSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enqueue($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gather DTMF signals to build interactive menus.
     *
     * You can pass a list of valid digits. The `Answer` command must be issued before the `gather` command.
     *
     * **Expected Webhooks:**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $gatherID = null,
        int $initialTimeoutMillis = 5000,
        int $interDigitTimeoutMillis = 5000,
        int $maximumDigits = 128,
        int $minimumDigits = 1,
        string $terminatingDigit = '#',
        int $timeoutMillis = 60000,
        string $validDigits = '0123456789#*',
        RequestOptions|array|null $requestOptions = null,
    ): ActionGatherResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'gatherID' => $gatherID,
                'initialTimeoutMillis' => $initialTimeoutMillis,
                'interDigitTimeoutMillis' => $interDigitTimeoutMillis,
                'maximumDigits' => $maximumDigits,
                'minimumDigits' => $minimumDigits,
                'terminatingDigit' => $terminatingDigit,
                'timeoutMillis' => $timeoutMillis,
                'validDigits' => $validDigits,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gather($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gather parameters defined in the request payload using a voice assistant.
     *
     *  You can pass parameters described as a JSON Schema object and the voice assistant will attempt to gather these informations.
     *
     * **Expected Webhooks:**
     *
     * - `call.ai_gather.ended`
     * - `call.conversation.ended`
     * - `call.ai_gather.partial_results` (if `send_partial_results` is set to `true`)
     * - `call.ai_gather.message_history_updated` (if `send_message_history_updates` is set to `true`)
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed> $parameters The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format
     * @param Assistant|AssistantShape $assistant assistant configuration including choice of LLM, custom instructions, and tools
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param InterruptionSettings|InterruptionSettingsShape $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language Language to use for speech recognition
     * @param list<MessageHistory|MessageHistoryShape> $messageHistory the message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant
     * @param bool $sendMessageHistoryUpdates Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     * @param bool $sendPartialResults Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     * @param TranscriptionConfig|TranscriptionConfigShape $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param int $userResponseTimeoutMs the number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param VoiceSettingsShape $voiceSettings The settings associated with the voice selected
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array $parameters,
        Assistant|array|null $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        GoogleTranscriptionLanguage|string $language = 'en',
        ?array $messageHistory = null,
        ?bool $sendMessageHistoryUpdates = null,
        ?bool $sendPartialResults = null,
        TranscriptionConfig|array|null $transcription = null,
        int $userResponseTimeoutMs = 10000,
        string $voice = 'Telnyx.KokoroTTS.af',
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionGatherUsingAIResponse {
        $params = Util::removeNulls(
            [
                'parameters' => $parameters,
                'assistant' => $assistant,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'greeting' => $greeting,
                'interruptionSettings' => $interruptionSettings,
                'language' => $language,
                'messageHistory' => $messageHistory,
                'sendMessageHistoryUpdates' => $sendMessageHistoryUpdates,
                'sendPartialResults' => $sendPartialResults,
                'transcription' => $transcription,
                'userResponseTimeoutMs' => $userResponseTimeoutMs,
                'voice' => $voice,
                'voiceSettings' => $voiceSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gatherUsingAI($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Play an audio file on the call until the required DTMF signals are gathered to build interactive menus.
     *
     * You can pass a list of valid digits along with an 'invalid_audio_url', which will be played back at the beginning of each prompt. Playback will be interrupted when a DTMF signal is received. The `Answer command must be issued before the `gather_using_audio` command.
     *
     * **Expected Webhooks:**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        int $interDigitTimeoutMillis = 5000,
        ?string $invalidAudioURL = null,
        ?string $invalidMediaName = null,
        int $maximumDigits = 128,
        int $maximumTries = 3,
        ?string $mediaName = null,
        int $minimumDigits = 1,
        string $terminatingDigit = '#',
        int $timeoutMillis = 60000,
        string $validDigits = '0123456789#*',
        RequestOptions|array|null $requestOptions = null,
    ): ActionGatherUsingAudioResponse {
        $params = Util::removeNulls(
            [
                'audioURL' => $audioURL,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'interDigitTimeoutMillis' => $interDigitTimeoutMillis,
                'invalidAudioURL' => $invalidAudioURL,
                'invalidMediaName' => $invalidMediaName,
                'maximumDigits' => $maximumDigits,
                'maximumTries' => $maximumTries,
                'mediaName' => $mediaName,
                'minimumDigits' => $minimumDigits,
                'terminatingDigit' => $terminatingDigit,
                'timeoutMillis' => $timeoutMillis,
                'validDigits' => $validDigits,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gatherUsingAudio($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Convert text to speech and play it on the call until the required DTMF signals are gathered to build interactive menus.
     *
     * You can pass a list of valid digits along with an 'invalid_payload', which will be played back at the beginning of each prompt. Speech will be interrupted when a DTMF signal is received. The `Answer` command must be issued before the `gather_using_speak` command.
     *
     * **Expected Webhooks:**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
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
     * @param VoiceSettingsShape1 $voiceSettings The settings associated with the voice selected
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        string $payload,
        string $voice,
        ?string $clientState = null,
        ?string $commandID = null,
        int $interDigitTimeoutMillis = 5000,
        ?string $invalidPayload = null,
        Language|string|null $language = null,
        int $maximumDigits = 128,
        int $maximumTries = 3,
        int $minimumDigits = 1,
        PayloadType|string $payloadType = 'text',
        ServiceLevel|string $serviceLevel = 'premium',
        string $terminatingDigit = '#',
        int $timeoutMillis = 60000,
        string $validDigits = '0123456789#*',
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionGatherUsingSpeakResponse {
        $params = Util::removeNulls(
            [
                'payload' => $payload,
                'voice' => $voice,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'interDigitTimeoutMillis' => $interDigitTimeoutMillis,
                'invalidPayload' => $invalidPayload,
                'language' => $language,
                'maximumDigits' => $maximumDigits,
                'maximumTries' => $maximumTries,
                'minimumDigits' => $minimumDigits,
                'payloadType' => $payloadType,
                'serviceLevel' => $serviceLevel,
                'terminatingDigit' => $terminatingDigit,
                'timeoutMillis' => $timeoutMillis,
                'validDigits' => $validDigits,
                'voiceSettings' => $voiceSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gatherUsingSpeak($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Hang up the call.
     *
     * **Expected Webhooks:**
     *
     * - `call.hangup`
     * - `call.recording.saved`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionHangupResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->hangup($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes the call from a queue.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionLeaveQueueResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->leaveQueue($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause recording the call. Recording can be resumed via Resume recording command.
     *
     * **Expected Webhooks:**
     *
     * There are no webhooks associated with this command.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionPauseRecordingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'recordingID' => $recordingID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pauseRecording($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Initiate a SIP Refer on a Call Control call. You can initiate a SIP Refer at any point in the duration of a call.
     *
     * **Expected Webhooks:**
     *
     * - `call.refer.started`
     * - `call.refer.completed`
     * - `call.refer.failed`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $sipAddress the SIP URI to which the call will be referred to
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders custom headers to be added to the SIP INVITE
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader|SipHeaderShape> $sipHeaders SIP headers to be added to the request. Currently only User-to-User header is supported.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        string $sipAddress,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionReferResponse {
        $params = Util::removeNulls(
            [
                'sipAddress' => $sipAddress,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'customHeaders' => $customHeaders,
                'sipAuthPassword' => $sipAuthPassword,
                'sipAuthUsername' => $sipAuthUsername,
                'sipHeaders' => $sipHeaders,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refer($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Reject an incoming call.
     *
     * **Expected Webhooks:**
     *
     * - `call.hangup`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param Cause|value-of<Cause> $cause cause for call rejection
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        Cause|string $cause,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRejectResponse {
        $params = Util::removeNulls(
            [
                'cause' => $cause,
                'clientState' => $clientState,
                'commandID' => $commandID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->reject($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume recording the call.
     *
     * **Expected Webhooks:**
     *
     * There are no webhooks associated with this command.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResumeRecordingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'recordingID' => $recordingID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resumeRecording($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends DTMF tones from this leg. DTMF tones will be heard by the other end of the call.
     *
     * **Expected Webhooks:**
     *
     * There are no webhooks associated with this command.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $digits DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $durationMillis Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        string $digits,
        ?string $clientState = null,
        ?string $commandID = null,
        int $durationMillis = 250,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSendDtmfResponse {
        $params = Util::removeNulls(
            [
                'digits' => $digits,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'durationMillis' => $durationMillis,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendDtmf($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends SIP info from this leg.
     *
     * **Expected Webhooks:**
     *
     * - `call.sip_info.received` (to be received on the target call leg)
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $body Content of the SIP INFO
     * @param string $contentType Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        string $body,
        string $contentType,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSendSipInfoResponse {
        $params = Util::removeNulls(
            [
                'body' => $body,
                'contentType' => $contentType,
                'clientState' => $clientState,
                'commandID' => $commandID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendSipInfo($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Convert text to speech and play it back on the call. If multiple speak text commands are issued consecutively, the audio files will be placed in a queue awaiting playback.
     *
     * **Expected Webhooks:**
     *
     * - `call.speak.started`
     * - `call.speak.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
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
     * @param VoiceSettingsShape2 $voiceSettings The settings associated with the voice selected
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        string $payload,
        string $voice,
        ?string $clientState = null,
        ?string $commandID = null,
        \Telnyx\Calls\Actions\ActionSpeakParams\Language|string|null $language = null,
        \Telnyx\Calls\Actions\ActionSpeakParams\PayloadType|string $payloadType = 'text',
        \Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel|string $serviceLevel = 'premium',
        ?string $stop = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSpeakResponse {
        $params = Util::removeNulls(
            [
                'payload' => $payload,
                'voice' => $voice,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'language' => $language,
                'payloadType' => $payloadType,
                'serviceLevel' => $serviceLevel,
                'stop' => $stop,
                'voiceSettings' => $voiceSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->speak($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start an AI assistant on the call.
     *
     * **Expected Webhooks:**
     *
     * - `call.conversation.ended`
     * - `call.conversation_insights.generated`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param \Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant|AssistantShape1 $assistant AI Assistant configuration
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param InterruptionSettings|InterruptionSettingsShape $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param TranscriptionConfig|TranscriptionConfigShape $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param VoiceSettingsShape3 $voiceSettings The settings associated with the voice selected
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        \Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant|array|null $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        TranscriptionConfig|array|null $transcription = null,
        string $voice = 'Telnyx.KokoroTTS.af',
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartAIAssistantResponse {
        $params = Util::removeNulls(
            [
                'assistant' => $assistant,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'greeting' => $greeting,
                'interruptionSettings' => $interruptionSettings,
                'transcription' => $transcription,
                'voice' => $voice,
                'voiceSettings' => $voiceSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startAIAssistant($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Call forking allows you to stream the media from a call to a specific target in realtime.
     * This stream can be used to enable realtime audio analysis to support a
     * variety of use cases, including fraud detection, or the creation of AI-generated audio responses.
     * Requests must specify either the `target` attribute or the `rx` and `tx` attributes.
     *
     * **Expected Webhooks:**
     *
     * - `call.fork.started`
     * - `call.fork.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $rx the network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded
     * @param StreamType|value-of<StreamType> $streamType Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     * @param string $tx the network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $rx = null,
        StreamType|string $streamType = 'decrypted',
        ?string $tx = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartForkingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'rx' => $rx,
                'streamType' => $streamType,
                'tx' => $tx,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startForking($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Noise Suppression Start (BETA)
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param Direction|value-of<Direction> $direction the direction of the audio stream to be noise suppressed
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noiseSuppressionEngine The engine to use for noise suppression.
     * For backward compatibility, engines A and B are also supported, but are deprecated:
     *  A - Denoiser
     *  B - DeepFilterNet
     * @param NoiseSuppressionEngineConfig|NoiseSuppressionEngineConfigShape $noiseSuppressionEngineConfig configuration parameters for noise suppression engines
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        Direction|string $direction = 'inbound',
        NoiseSuppressionEngine|string $noiseSuppressionEngine = 'Denoiser',
        NoiseSuppressionEngineConfig|array|null $noiseSuppressionEngineConfig = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'direction' => $direction,
                'noiseSuppressionEngine' => $noiseSuppressionEngine,
                'noiseSuppressionEngineConfig' => $noiseSuppressionEngineConfig,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startNoiseSuppression($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Play an audio file on the call. If multiple play audio commands are issued consecutively,
     * the audio files will be placed in a queue awaiting playback.
     *
     * *Notes:*
     *
     * - When `overlay` is enabled, `target_legs` is limited to `self`.
     * - A customer cannot Play Audio with `overlay=true` unless there is a Play Audio with `overlay=false` actively playing.
     *
     * **Expected Webhooks:**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param AudioType|value-of<AudioType> $audioType specifies the type of audio provided in `audio_url` or `playback_content`
     * @param string $audioURL The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param bool $cacheAudio Caches the audio file. Useful when playing the same audio file multiple times during the call.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param LoopcountShape $loop The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     * @param string $mediaName The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param bool $overlay When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     * @param string $playbackContent Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty
     * @param string $stop When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     * @param string $targetLegs Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        AudioType|string $audioType = 'mp3',
        ?string $audioURL = null,
        bool $cacheAudio = true,
        ?string $clientState = null,
        ?string $commandID = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
        bool $overlay = false,
        ?string $playbackContent = null,
        ?string $stop = null,
        string $targetLegs = 'self',
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartPlaybackResponse {
        $params = Util::removeNulls(
            [
                'audioType' => $audioType,
                'audioURL' => $audioURL,
                'cacheAudio' => $cacheAudio,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'loop' => $loop,
                'mediaName' => $mediaName,
                'overlay' => $overlay,
                'playbackContent' => $playbackContent,
                'stop' => $stop,
                'targetLegs' => $targetLegs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startPlayback($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
     *
     * **Expected Webhooks:**
     *
     * - `call.recording.saved`
     * - `call.recording.transcription.saved`
     * - `call.recording.error`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        Channels|string $channels,
        Format|string $format,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $customFileName = null,
        int $maxLength = 0,
        ?bool $playBeep = null,
        RecordingTrack|string $recordingTrack = 'both',
        int $timeoutSecs = 0,
        bool $transcription = false,
        string $transcriptionEngine = 'A',
        TranscriptionLanguage|string $transcriptionLanguage = 'en-US',
        int $transcriptionMaxSpeakerCount = 6,
        int $transcriptionMinSpeakerCount = 2,
        bool $transcriptionProfanityFilter = false,
        bool $transcriptionSpeakerDiarization = false,
        Trim|string|null $trim = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartRecordingResponse {
        $params = Util::removeNulls(
            [
                'channels' => $channels,
                'format' => $format,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'customFileName' => $customFileName,
                'maxLength' => $maxLength,
                'playBeep' => $playBeep,
                'recordingTrack' => $recordingTrack,
                'timeoutSecs' => $timeoutSecs,
                'transcription' => $transcription,
                'transcriptionEngine' => $transcriptionEngine,
                'transcriptionLanguage' => $transcriptionLanguage,
                'transcriptionMaxSpeakerCount' => $transcriptionMaxSpeakerCount,
                'transcriptionMinSpeakerCount' => $transcriptionMinSpeakerCount,
                'transcriptionProfanityFilter' => $transcriptionProfanityFilter,
                'transcriptionSpeakerDiarization' => $transcriptionSpeakerDiarization,
                'trim' => $trim,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startRecording($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start siprec session to configured in SIPREC connector SRS.
     *
     * **Expected Webhooks:**
     *
     * - `siprec.started`
     * - `siprec.stopped`
     * - `siprec.failed`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $connectorName name of configured SIPREC connector to be used
     * @param bool $includeMetadataCustomHeaders When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param bool $secure Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport specifies SIP transport protocol
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack specifies which track should be sent on siprec session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        ?string $clientState = null,
        ?string $connectorName = null,
        ?bool $includeMetadataCustomHeaders = null,
        ?bool $secure = null,
        int $sessionTimeoutSecs = 1800,
        SipTransport|string $sipTransport = 'udp',
        SiprecTrack|string $siprecTrack = 'both_tracks',
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartSiprecResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'connectorName' => $connectorName,
                'includeMetadataCustomHeaders' => $includeMetadataCustomHeaders,
                'secure' => $secure,
                'sessionTimeoutSecs' => $sessionTimeoutSecs,
                'sipTransport' => $sipTransport,
                'siprecTrack' => $siprecTrack,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startSiprec($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
     *
     * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param DialogflowConfig|DialogflowConfigShape $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate> $streamBidirectionalSamplingRate audio sampling rate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param \Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack|value-of<\Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        DialogflowConfig|array|null $dialogflowConfig = null,
        bool $enableDialogflow = false,
        StreamBidirectionalCodec|string $streamBidirectionalCodec = 'PCMU',
        StreamBidirectionalMode|string $streamBidirectionalMode = 'mp3',
        StreamBidirectionalSamplingRate|int $streamBidirectionalSamplingRate = 8000,
        StreamBidirectionalTargetLegs|string $streamBidirectionalTargetLegs = 'opposite',
        StreamCodec|string $streamCodec = 'default',
        \Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack|string $streamTrack = 'inbound_track',
        ?string $streamURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartStreamingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'dialogflowConfig' => $dialogflowConfig,
                'enableDialogflow' => $enableDialogflow,
                'streamBidirectionalCodec' => $streamBidirectionalCodec,
                'streamBidirectionalMode' => $streamBidirectionalMode,
                'streamBidirectionalSamplingRate' => $streamBidirectionalSamplingRate,
                'streamBidirectionalTargetLegs' => $streamBidirectionalTargetLegs,
                'streamCodec' => $streamCodec,
                'streamTrack' => $streamTrack,
                'streamURL' => $streamURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startStreaming($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start real-time transcription. Transcription will stop on call hang-up, or can be initiated via the Transcription stop command.
     *
     * **Expected Webhooks:**
     *
     * - `call.transcription`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     * @param TranscriptionEngineConfigShape $transcriptionEngineConfig
     * @param string $transcriptionTracks Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        TranscriptionEngine|string $transcriptionEngine = 'Google',
        TranscriptionEngineGoogleConfig|array|TranscriptionEngineTelnyxConfig|DeepgramNova2Config|DeepgramNova3Config|TranscriptionEngineAzureConfig|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig = null,
        string $transcriptionTracks = 'inbound',
        RequestOptions|array|null $requestOptions = null,
    ): ActionStartTranscriptionResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'transcriptionEngine' => $transcriptionEngine,
                'transcriptionEngineConfig' => $transcriptionEngineConfig,
                'transcriptionTracks' => $transcriptionTracks,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startTranscription($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop an AI assistant on the call.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopAIAssistantResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopAIAssistant($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop forking a call.
     *
     * **Expected Webhooks:**
     *
     * - `call.fork.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param \Telnyx\Calls\Actions\ActionStopForkingParams\StreamType|value-of<\Telnyx\Calls\Actions\ActionStopForkingParams\StreamType> $streamType Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        \Telnyx\Calls\Actions\ActionStopForkingParams\StreamType|string $streamType = 'raw',
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopForkingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'streamType' => $streamType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopForking($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop current gather.
     *
     * **Expected Webhooks:**
     *
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopGatherResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopGather($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Noise Suppression Stop (BETA)
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopNoiseSuppression($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop audio being played on the call.
     *
     * **Expected Webhooks:**
     *
     * - `call.playback.ended` or `call.speak.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param bool $overlay when enabled, it stops the audio being played in the overlay queue
     * @param string $stop Use `current` to stop the current audio being played. Use `all` to stop the current audio file being played and clear all audio files from the queue.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        bool $overlay = false,
        string $stop = 'all',
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopPlaybackResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'overlay' => $overlay,
                'stop' => $stop,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopPlayback($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop recording the call.
     *
     * **Expected Webhooks:**
     *
     * - `call.recording.saved`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopRecordingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'recordingID' => $recordingID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopRecording($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop SIPREC session.
     *
     * **Expected Webhooks:**
     *
     * - `siprec.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopSiprecResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopSiprec($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop streaming a call to a WebSocket.
     *
     * **Expected Webhooks:**
     *
     * - `streaming.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $streamID Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $streamID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopStreamingResponse {
        $params = Util::removeNulls(
            [
                'clientState' => $clientState,
                'commandID' => $commandID,
                'streamID' => $streamID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopStreaming($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop real-time transcription.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionStopTranscriptionResponse {
        $params = Util::removeNulls(
            ['clientState' => $clientState, 'commandID' => $commandID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopTranscription($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Switch the supervisor role for a bridged call. This allows switching between different supervisor modes during an active call
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param Role|value-of<Role> $role The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        Role|string $role,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSwitchSupervisorRoleResponse {
        $params = Util::removeNulls(['role' => $role]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->switchSupervisorRole($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Transfer a call to a new destination. If the transfer is unsuccessful, a `call.hangup` webhook for the other call (Leg B) will be sent indicating that the transfer could not be completed. The original call will remain active and may be issued additional commands, potentially transfering the call to an alternate destination.
     *
     * **Expected Webhooks:**
     *
     * - `call.initiated`
     * - `call.bridged` to Leg B
     * - `call.answered` or `call.hangup`
     * - `call.machine.detection.ended` if `answering_machine_detection` was requested
     * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
     * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
     * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $to the DID or SIP URI to dial out to
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     * @param AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape $answeringMachineDetectionConfig optional configuration parameters to modify 'answering_machine_detection' performance
     * @param string $audioURL The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders custom headers to be added to the SIP INVITE
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
     * @param list<SipHeader|SipHeaderShape> $sipHeaders SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     * @param SipRegion|value-of<SipRegion> $sipRegion defines the SIP region to be used for the call
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param SoundModifications|SoundModificationsShape $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param string $targetLegClientState Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     * @param int $timeLimitSecs Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param \Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod|value-of<\Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        string $to,
        AnsweringMachineDetection|string $answeringMachineDetection = 'disabled',
        AnsweringMachineDetectionConfig|array|null $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        bool $earlyMedia = true,
        ?string $from = null,
        ?string $fromDisplayName = null,
        MediaEncryption|string $mediaEncryption = 'disabled',
        ?string $mediaName = null,
        \Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf|string $muteDtmf = 'none',
        ?string $parkAfterUnbridge = null,
        \Telnyx\Calls\Actions\ActionTransferParams\Record|string|null $record = null,
        \Telnyx\Calls\Actions\ActionTransferParams\RecordChannels|string $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        \Telnyx\Calls\Actions\ActionTransferParams\RecordFormat|string $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        \Telnyx\Calls\Actions\ActionTransferParams\RecordTrack|string $recordTrack = 'both',
        \Telnyx\Calls\Actions\ActionTransferParams\RecordTrim|string|null $recordTrim = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        SipRegion|string $sipRegion = 'US',
        SipTransportProtocol|string $sipTransportProtocol = 'UDP',
        SoundModifications|array|null $soundModifications = null,
        ?string $targetLegClientState = null,
        int $timeLimitSecs = 14400,
        int $timeoutSecs = 30,
        ?string $webhookURL = null,
        \Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod|string $webhookURLMethod = 'POST',
        RequestOptions|array|null $requestOptions = null,
    ): ActionTransferResponse {
        $params = Util::removeNulls(
            [
                'to' => $to,
                'answeringMachineDetection' => $answeringMachineDetection,
                'answeringMachineDetectionConfig' => $answeringMachineDetectionConfig,
                'audioURL' => $audioURL,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'customHeaders' => $customHeaders,
                'earlyMedia' => $earlyMedia,
                'from' => $from,
                'fromDisplayName' => $fromDisplayName,
                'mediaEncryption' => $mediaEncryption,
                'mediaName' => $mediaName,
                'muteDtmf' => $muteDtmf,
                'parkAfterUnbridge' => $parkAfterUnbridge,
                'record' => $record,
                'recordChannels' => $recordChannels,
                'recordCustomFileName' => $recordCustomFileName,
                'recordFormat' => $recordFormat,
                'recordMaxLength' => $recordMaxLength,
                'recordTimeoutSecs' => $recordTimeoutSecs,
                'recordTrack' => $recordTrack,
                'recordTrim' => $recordTrim,
                'sipAuthPassword' => $sipAuthPassword,
                'sipAuthUsername' => $sipAuthUsername,
                'sipHeaders' => $sipHeaders,
                'sipRegion' => $sipRegion,
                'sipTransportProtocol' => $sipTransportProtocol,
                'soundModifications' => $soundModifications,
                'targetLegClientState' => $targetLegClientState,
                'timeLimitSecs' => $timeLimitSecs,
                'timeoutSecs' => $timeoutSecs,
                'webhookURL' => $webhookURL,
                'webhookURLMethod' => $webhookURLMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->transfer($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates client state
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        string $clientState,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUpdateClientStateResponse {
        $params = Util::removeNulls(['clientState' => $clientState]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateClientState($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
