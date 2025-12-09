<?php

declare(strict_types=1);

namespace Telnyx\Services\Calls;

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
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory\Role;
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
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\SipRegion;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateResponse;
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngine;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Calls\ActionsContract;

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
     * @param list<array{
     *   name: string, value: string
     * }|CustomSipHeader> $customHeaders Custom headers to be added to the SIP INVITE response
     * @param 'G722,PCMU,PCMA,G729,OPUS,VP8,H264'|PreferredCodecs $preferredCodecs the list of comma-separated codecs in a preferred order for the forked media to be received
     * @param 'record-from-answer'|Record $record Start recording automatically after an event. Disabled by default.
     * @param 'single'|'dual'|RecordChannels $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param 'wav'|'mp3'|RecordFormat $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param 'both'|'inbound'|'outbound'|RecordTrack $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param 'trim-silence'|RecordTrim $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param bool $sendSilenceWhenIdle generate silence RTP packets when no transmission available
     * @param list<array{
     *   name: 'User-to-User'|Name, value: string
     * }|SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     * @param array{
     *   octaves?: float, pitch?: float, semitone?: float, track?: string
     * } $soundModifications Use this field to modify sound effects, for example adjust the pitch
     * @param 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param 'mp3'|'rtp'|StreamBidirectionalMode $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param 'inbound_track'|'outbound_track'|'both_tracks'|StreamTrack $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param bool $transcription Enable transcription upon call answer. The default value is false.
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   transcriptionEngine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|TranscriptionEngine,
     *   transcriptionEngineConfig?: array<string,mixed>,
     *   transcriptionTracks?: string,
     * } $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param 'POST'|'GET'|WebhookURLMethod $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        ?string $billingGroupID = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        string|PreferredCodecs|null $preferredCodecs = null,
        string|Record|null $record = null,
        string|RecordChannels $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        string|RecordFormat $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        string|RecordTrack $recordTrack = 'both',
        string|RecordTrim|null $recordTrim = null,
        bool $sendSilenceWhenIdle = false,
        ?array $sipHeaders = null,
        ?array $soundModifications = null,
        string|StreamBidirectionalCodec $streamBidirectionalCodec = 'PCMU',
        string|StreamBidirectionalMode $streamBidirectionalMode = 'mp3',
        string|StreamBidirectionalTargetLegs $streamBidirectionalTargetLegs = 'opposite',
        string|StreamCodec $streamCodec = 'default',
        string|StreamTrack $streamTrack = 'inbound_track',
        ?string $streamURL = null,
        bool $transcription = false,
        ?array $transcriptionConfig = null,
        ?string $webhookURL = null,
        string|WebhookURLMethod $webhookURLMethod = 'POST',
        ?RequestOptions $requestOptions = null,
    ): ActionAnswerResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param string $callControlID_ Unique identifier and token for controlling the call
     * @param string $callControlID the Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param 'none'|'both'|'self'|'opposite'|MuteDtmf $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param bool $playRingtone specifies whether to play a ringtone if the call you want to bridge with has not yet been answered
     * @param string $queue The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     * @param 'record-from-answer'|\Telnyx\Calls\Actions\ActionBridgeParams\Record $record Start recording automatically after an event. Disabled by default.
     * @param 'single'|'dual'|\Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param 'wav'|'mp3'|\Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param 'both'|'inbound'|'outbound'|\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param 'trim-silence'|\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param 'at'|'au'|'be'|'bg'|'br'|'ch'|'cl'|'cn'|'cz'|'de'|'dk'|'ee'|'es'|'fi'|'fr'|'gr'|'hu'|'il'|'in'|'it'|'jp'|'lt'|'mx'|'my'|'nl'|'no'|'nz'|'ph'|'pl'|'pt'|'ru'|'se'|'sg'|'th'|'tw'|'uk'|'us-old'|'us'|'ve'|'za'|Ringtone $ringtone Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     * @param string $videoRoomContext The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     * @param string $videoRoomID the ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlID_,
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        string|MuteDtmf $muteDtmf = 'none',
        ?string $parkAfterUnbridge = null,
        bool $playRingtone = false,
        ?string $queue = null,
        string|\Telnyx\Calls\Actions\ActionBridgeParams\Record|null $record = null,
        string|\Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        string|\Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        string|\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack $recordTrack = 'both',
        string|\Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim|null $recordTrim = null,
        string|Ringtone $ringtone = 'us',
        ?string $videoRoomContext = null,
        ?string $videoRoomID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionBridgeResponse {
        $params = [
            'callControlID' => $callControlID,
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bridge($callControlID_, params: $params, requestOptions: $requestOptions);

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
        ?RequestOptions $requestOptions = null,
    ): ActionEnqueueResponse {
        $params = [
            'queueName' => $queueName,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'keepAfterHangup' => $keepAfterHangup,
            'maxSize' => $maxSize,
            'maxWaitTimeSecs' => $maxWaitTimeSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
        ?RequestOptions $requestOptions = null,
    ): ActionGatherResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param mixed $parameters The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format
     * @param array{
     *   instructions?: string,
     *   model?: string,
     *   openaiAPIKeyRef?: string,
     *   tools?: list<array<string,mixed>>,
     * } $assistant Assistant configuration including choice of LLM, custom instructions, and tools
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param array{
     *   enable?: bool
     * } $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param 'af'|'sq'|'am'|'ar'|'hy'|'az'|'eu'|'bn'|'bs'|'bg'|'my'|'ca'|'yue'|'zh'|'hr'|'cs'|'da'|'nl'|'en'|'et'|'fil'|'fi'|'fr'|'gl'|'ka'|'de'|'el'|'gu'|'iw'|'hi'|'hu'|'is'|'id'|'it'|'ja'|'jv'|'kn'|'kk'|'km'|'ko'|'lo'|'lv'|'lt'|'mk'|'ms'|'ml'|'mr'|'mn'|'ne'|'no'|'fa'|'pl'|'pt'|'pa'|'ro'|'ru'|'rw'|'sr'|'si'|'sk'|'sl'|'ss'|'st'|'es'|'su'|'sw'|'sv'|'ta'|'te'|'th'|'tn'|'tr'|'ts'|'uk'|'ur'|'uz'|'ve'|'vi'|'xh'|'zu'|GoogleTranscriptionLanguage $language Language to use for speech recognition
     * @param list<array{
     *   content?: string, role?: 'assistant'|'user'|Role
     * }> $messageHistory The message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant
     * @param bool $sendMessageHistoryUpdates Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     * @param bool $sendPartialResults Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     * @param array{
     *   model?: string
     * } $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param int $userResponseTimeoutMs the number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param array<string,mixed> $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        mixed $parameters,
        ?array $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        ?array $interruptionSettings = null,
        string|GoogleTranscriptionLanguage $language = 'en',
        ?array $messageHistory = null,
        ?bool $sendMessageHistoryUpdates = null,
        ?bool $sendPartialResults = null,
        ?array $transcription = null,
        int $userResponseTimeoutMs = 10000,
        string $voice = 'Telnyx.KokoroTTS.af',
        ?array $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAIResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAudioResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'arb'|'cmn-CN'|'cy-GB'|'da-DK'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IN'|'en-US'|'es-ES'|'es-MX'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|Language $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param int $maximumDigits The maximum number of digits to fetch. This parameter has a maximum value of 128.
     * @param int $maximumTries the maximum number of times that a file should be played back if there is no input from the user on the call
     * @param int $minimumDigits The minimum number of digits to fetch. This parameter has a minimum value of 1.
     * @param 'text'|'ssml'|PayloadType $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param 'basic'|'premium'|ServiceLevel $serviceLevel This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     * @param string $terminatingDigit the digit used to terminate input if fewer than `maximum_digits` digits have been gathered
     * @param int $timeoutMillis the number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file
     * @param string $validDigits a list of all digits accepted as valid
     * @param array<string,mixed> $voiceSettings The settings associated with the voice selected
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
        string|Language|null $language = null,
        int $maximumDigits = 128,
        int $maximumTries = 3,
        int $minimumDigits = 1,
        string|PayloadType $payloadType = 'text',
        string|ServiceLevel $serviceLevel = 'premium',
        string $terminatingDigit = '#',
        int $timeoutMillis = 60000,
        string $validDigits = '0123456789#*',
        ?array $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingSpeakResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param list<array{
     *   name: string, value: string
     * }|CustomSipHeader> $customHeaders Custom headers to be added to the SIP INVITE
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<array{
     *   name: 'User-to-User'|Name, value: string
     * }|SipHeader> $sipHeaders SIP headers to be added to the request. Currently only User-to-User header is supported.
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
        ?RequestOptions $requestOptions = null,
    ): ActionReferResponse {
        $params = [
            'sipAddress' => $sipAddress,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'customHeaders' => $customHeaders,
            'sipAuthPassword' => $sipAuthPassword,
            'sipAuthUsername' => $sipAuthUsername,
            'sipHeaders' => $sipHeaders,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'CALL_REJECTED'|'USER_BUSY'|Cause $cause cause for call rejection
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        string|Cause $cause,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse {
        $params = [
            'cause' => $cause,
            'clientState' => $clientState,
            'commandID' => $commandID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        string $digits,
        ?string $clientState = null,
        ?string $commandID = null,
        int $durationMillis = 250,
        ?RequestOptions $requestOptions = null,
    ): ActionSendDtmfResponse {
        $params = [
            'digits' => $digits,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'durationMillis' => $durationMillis,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        string $body,
        string $contentType,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionSendSipInfoResponse {
        $params = [
            'body' => $body,
            'contentType' => $contentType,
            'clientState' => $clientState,
            'commandID' => $commandID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'arb'|'cmn-CN'|'cy-GB'|'da-DK'|'de-DE'|'en-AU'|'en-GB'|'en-GB-WLS'|'en-IN'|'en-US'|'es-ES'|'es-MX'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'is-IS'|'it-IT'|'ja-JP'|'ko-KR'|'nb-NO'|'nl-NL'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'sv-SE'|'tr-TR'|\Telnyx\Calls\Actions\ActionSpeakParams\Language $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param 'text'|'ssml'|\Telnyx\Calls\Actions\ActionSpeakParams\PayloadType $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param 'basic'|'premium'|\Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel $serviceLevel This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     * @param string $stop When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     * @param array<string,mixed> $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        string $payload,
        string $voice,
        ?string $clientState = null,
        ?string $commandID = null,
        string|\Telnyx\Calls\Actions\ActionSpeakParams\Language|null $language = null,
        string|\Telnyx\Calls\Actions\ActionSpeakParams\PayloadType $payloadType = 'text',
        string|\Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel $serviceLevel = 'premium',
        ?string $stop = null,
        ?array $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse {
        $params = [
            'payload' => $payload,
            'voice' => $voice,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'language' => $language,
            'payloadType' => $payloadType,
            'serviceLevel' => $serviceLevel,
            'stop' => $stop,
            'voiceSettings' => $voiceSettings,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param array{
     *   id?: string, instructions?: string, openaiAPIKeyRef?: string
     * } $assistant AI Assistant configuration
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param array{
     *   enable?: bool
     * } $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param array{
     *   model?: string
     * } $transcription The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     * @param string $voice The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * @param array<string,mixed> $voiceSettings The settings associated with the voice selected
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        ?array $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        ?array $interruptionSettings = null,
        ?array $transcription = null,
        string $voice = 'Telnyx.KokoroTTS.af',
        ?array $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStartAIAssistantResponse {
        $params = [
            'assistant' => $assistant,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'greeting' => $greeting,
            'interruptionSettings' => $interruptionSettings,
            'transcription' => $transcription,
            'voice' => $voice,
            'voiceSettings' => $voiceSettings,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'decrypted'|StreamType $streamType Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     * @param string $tx the network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $rx = null,
        string|StreamType $streamType = 'decrypted',
        ?string $tx = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStartForkingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'rx' => $rx,
            'streamType' => $streamType,
            'tx' => $tx,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'inbound'|'outbound'|'both'|Direction $direction the direction of the audio stream to be noise suppressed
     * @param 'Denoiser'|'DeepFilterNet'|NoiseSuppressionEngine $noiseSuppressionEngine The engine to use for noise suppression.
     * For backward compatibility, engines A and B are also supported, but are deprecated:
     *  A - Denoiser
     *  B - DeepFilterNet
     * @param array{
     *   attenuationLimit?: int
     * } $noiseSuppressionEngineConfig Configuration parameters for noise suppression engines
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        string|Direction $direction = 'inbound',
        string|NoiseSuppressionEngine $noiseSuppressionEngine = 'Denoiser',
        ?array $noiseSuppressionEngineConfig = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'direction' => $direction,
            'noiseSuppressionEngine' => $noiseSuppressionEngine,
            'noiseSuppressionEngineConfig' => $noiseSuppressionEngineConfig,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'mp3'|'wav'|AudioType $audioType specifies the type of audio provided in `audio_url` or `playback_content`
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
        string|AudioType $audioType = 'mp3',
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
        ?RequestOptions $requestOptions = null,
    ): ActionStartPlaybackResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'single'|'dual'|Channels $channels when `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B
     * @param 'wav'|'mp3'|Format $format The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $customFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param int $maxLength Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite)
     * @param bool $playBeep if enabled, a beep sound will be played at the start of a recording
     * @param 'both'|'inbound'|'outbound'|RecordingTrack $recordingTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite)
     * @param bool $transcription Enable post recording transcription. The default value is false.
     * @param string $transcriptionEngine Engine to use for speech recognition. `A` - `Google`
     * @param 'af-ZA'|'am-ET'|'ar-AE'|'ar-BH'|'ar-DZ'|'ar-EG'|'ar-IL'|'ar-IQ'|'ar-JO'|'ar-KW'|'ar-LB'|'ar-MA'|'ar-MR'|'ar-OM'|'ar-PS'|'ar-QA'|'ar-SA'|'ar-TN'|'ar-YE'|'az-AZ'|'bg-BG'|'bn-BD'|'bn-IN'|'bs-BA'|'ca-ES'|'cs-CZ'|'da-DK'|'de-AT'|'de-CH'|'de-DE'|'el-GR'|'en-AU'|'en-CA'|'en-GB'|'en-GH'|'en-HK'|'en-IE'|'en-IN'|'en-KE'|'en-NG'|'en-NZ'|'en-PH'|'en-PK'|'en-SG'|'en-TZ'|'en-US'|'en-ZA'|'es-AR'|'es-BO'|'es-CL'|'es-CO'|'es-CR'|'es-DO'|'es-EC'|'es-ES'|'es-GT'|'es-HN'|'es-MX'|'es-NI'|'es-PA'|'es-PE'|'es-PR'|'es-PY'|'es-SV'|'es-US'|'es-UY'|'es-VE'|'et-EE'|'eu-ES'|'fa-IR'|'fi-FI'|'fil-PH'|'fr-BE'|'fr-CA'|'fr-CH'|'fr-FR'|'gl-ES'|'gu-IN'|'hi-IN'|'hr-HR'|'hu-HU'|'hy-AM'|'id-ID'|'is-IS'|'it-CH'|'it-IT'|'iw-IL'|'ja-JP'|'jv-ID'|'ka-GE'|'kk-KZ'|'km-KH'|'kn-IN'|'ko-KR'|'lo-LA'|'lt-LT'|'lv-LV'|'mk-MK'|'ml-IN'|'mn-MN'|'mr-IN'|'ms-MY'|'my-MM'|'ne-NP'|'nl-BE'|'nl-NL'|'no-NO'|'pa-Guru-IN'|'pl-PL'|'pt-BR'|'pt-PT'|'ro-RO'|'ru-RU'|'rw-RW'|'si-LK'|'sk-SK'|'sl-SI'|'sq-AL'|'sr-RS'|'ss-latn-za'|'st-ZA'|'su-ID'|'sv-SE'|'sw-KE'|'sw-TZ'|'ta-IN'|'ta-LK'|'ta-MY'|'ta-SG'|'te-IN'|'th-TH'|'tn-latn-za'|'tr-TR'|'ts-ZA'|'uk-UA'|'ur-IN'|'ur-PK'|'uz-UZ'|'ve-ZA'|'vi-VN'|'xh-ZA'|'yue-Hant-HK'|'zh'|'zh-TW'|'zu-ZA'|TranscriptionLanguage $transcriptionLanguage Language to use for speech recognition
     * @param int $transcriptionMaxSpeakerCount Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     * @param int $transcriptionMinSpeakerCount Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     * @param bool $transcriptionProfanityFilter Enables profanity_filter. Applies to `google` engine only.
     * @param bool $transcriptionSpeakerDiarization Enables speaker diarization. Applies to `google` engine only.
     * @param 'trim-silence'|Trim $trim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        string|Channels $channels,
        string|Format $format,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $customFileName = null,
        int $maxLength = 0,
        ?bool $playBeep = null,
        string|RecordingTrack $recordingTrack = 'both',
        int $timeoutSecs = 0,
        bool $transcription = false,
        string $transcriptionEngine = 'A',
        string|TranscriptionLanguage $transcriptionLanguage = 'en-US',
        int $transcriptionMaxSpeakerCount = 6,
        int $transcriptionMinSpeakerCount = 2,
        bool $transcriptionProfanityFilter = false,
        bool $transcriptionSpeakerDiarization = false,
        string|Trim|null $trim = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStartRecordingResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'udp'|'tcp'|'tls'|SipTransport $sipTransport specifies SIP transport protocol
     * @param 'inbound_track'|'outbound_track'|'both_tracks'|SiprecTrack $siprecTrack specifies which track should be sent on siprec session
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
        string|SipTransport $sipTransport = 'udp',
        string|SiprecTrack $siprecTrack = 'both_tracks',
        ?RequestOptions $requestOptions = null,
    ): ActionStartSiprecResponse {
        $params = [
            'clientState' => $clientState,
            'connectorName' => $connectorName,
            'includeMetadataCustomHeaders' => $includeMetadataCustomHeaders,
            'secure' => $secure,
            'sessionTimeoutSecs' => $sessionTimeoutSecs,
            'sipTransport' => $sipTransport,
            'siprecTrack' => $siprecTrack,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param array{
     *   analyzeSentiment?: bool, partialAutomatedAgentReply?: bool
     * } $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param 'mp3'|'rtp'|StreamBidirectionalMode $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param 8000|16000|22050|24000|48000|StreamBidirectionalSamplingRate $streamBidirectionalSamplingRate audio sampling rate
     * @param 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param 'inbound_track'|'outbound_track'|'both_tracks'|\Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $dialogflowConfig = null,
        bool $enableDialogflow = false,
        string|StreamBidirectionalCodec $streamBidirectionalCodec = 'PCMU',
        string|StreamBidirectionalMode $streamBidirectionalMode = 'mp3',
        int|StreamBidirectionalSamplingRate $streamBidirectionalSamplingRate = 8000,
        string|StreamBidirectionalTargetLegs $streamBidirectionalTargetLegs = 'opposite',
        string|StreamCodec $streamCodec = 'default',
        string|\Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack $streamTrack = 'inbound_track',
        ?string $streamURL = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|\Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine $transcriptionEngine Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     * @param array<string,mixed> $transcriptionEngineConfig
     * @param string $transcriptionTracks Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        string|\Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine $transcriptionEngine = 'Google',
        ?array $transcriptionEngineConfig = null,
        string $transcriptionTracks = 'inbound',
        ?RequestOptions $requestOptions = null,
    ): ActionStartTranscriptionResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'transcriptionEngine' => $transcriptionEngine,
            'transcriptionEngineConfig' => $transcriptionEngineConfig,
            'transcriptionTracks' => $transcriptionTracks,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'raw'|'decrypted'|\Telnyx\Calls\Actions\ActionStopForkingParams\StreamType $streamType Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        string|\Telnyx\Calls\Actions\ActionStopForkingParams\StreamType $streamType = 'raw',
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'streamType' => $streamType,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        bool $overlay = false,
        string $stop = 'all',
        ?RequestOptions $requestOptions = null,
    ): ActionStopPlaybackResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'overlay' => $overlay,
            'stop' => $stop,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $recordingID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $streamID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'streamID' => $streamID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'barge'|'whisper'|'monitor'|\Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams\Role $role The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        string|\Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams\Role $role,
        ?RequestOptions $requestOptions = null,
    ): ActionSwitchSupervisorRoleResponse {
        $params = ['role' => $role];

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
     * @param 'premium'|'detect'|'detect_beep'|'detect_words'|'greeting_end'|'disabled'|AnsweringMachineDetection $answeringMachineDetection Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     * @param array{
     *   afterGreetingSilenceMillis?: int,
     *   betweenWordsSilenceMillis?: int,
     *   greetingDurationMillis?: int,
     *   greetingSilenceDurationMillis?: int,
     *   greetingTotalAnalysisTimeMillis?: int,
     *   initialSilenceMillis?: int,
     *   maximumNumberOfWords?: int,
     *   maximumWordLengthMillis?: int,
     *   silenceThreshold?: int,
     *   totalAnalysisTimeMillis?: int,
     * } $answeringMachineDetectionConfig Optional configuration parameters to modify 'answering_machine_detection' performance
     * @param string $audioURL The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param list<array{
     *   name: string, value: string
     * }|CustomSipHeader> $customHeaders Custom headers to be added to the SIP INVITE
     * @param bool $earlyMedia if set to false, early media will not be passed to the originating leg
     * @param string $from The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     * @param string $fromDisplayName The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     * @param 'disabled'|'SRTP'|'DTLS'|MediaEncryption $mediaEncryption defines whether media should be encrypted on the new call leg
     * @param string $mediaName The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param 'none'|'both'|'self'|'opposite'|\Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param 'record-from-answer'|\Telnyx\Calls\Actions\ActionTransferParams\Record $record Start recording automatically after an event. Disabled by default.
     * @param 'single'|'dual'|\Telnyx\Calls\Actions\ActionTransferParams\RecordChannels $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param 'wav'|'mp3'|\Telnyx\Calls\Actions\ActionTransferParams\RecordFormat $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param 'both'|'inbound'|'outbound'|\Telnyx\Calls\Actions\ActionTransferParams\RecordTrack $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param 'trim-silence'|\Telnyx\Calls\Actions\ActionTransferParams\RecordTrim $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<array{
     *   name: 'User-to-User'|Name, value: string
     * }|SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     * @param 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion $sipRegion defines the SIP region to be used for the call
     * @param 'UDP'|'TCP'|'TLS'|SipTransportProtocol $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param array{
     *   octaves?: float, pitch?: float, semitone?: float, track?: string
     * } $soundModifications Use this field to modify sound effects, for example adjust the pitch
     * @param string $targetLegClientState Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     * @param int $timeLimitSecs Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param 'POST'|'GET'|\Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        string $to,
        string|AnsweringMachineDetection $answeringMachineDetection = 'disabled',
        ?array $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        bool $earlyMedia = true,
        ?string $from = null,
        ?string $fromDisplayName = null,
        string|MediaEncryption $mediaEncryption = 'disabled',
        ?string $mediaName = null,
        string|\Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf $muteDtmf = 'none',
        ?string $parkAfterUnbridge = null,
        string|\Telnyx\Calls\Actions\ActionTransferParams\Record|null $record = null,
        string|\Telnyx\Calls\Actions\ActionTransferParams\RecordChannels $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        string|\Telnyx\Calls\Actions\ActionTransferParams\RecordFormat $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        string|\Telnyx\Calls\Actions\ActionTransferParams\RecordTrack $recordTrack = 'both',
        string|\Telnyx\Calls\Actions\ActionTransferParams\RecordTrim|null $recordTrim = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        string|SipRegion $sipRegion = 'US',
        string|SipTransportProtocol $sipTransportProtocol = 'UDP',
        ?array $soundModifications = null,
        ?string $targetLegClientState = null,
        int $timeLimitSecs = 14400,
        int $timeoutSecs = 30,
        ?string $webhookURL = null,
        string|\Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod $webhookURLMethod = 'POST',
        ?RequestOptions $requestOptions = null,
    ): ActionTransferResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        string $clientState,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateClientStateResponse {
        $params = ['clientState' => $clientState];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateClientState($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
