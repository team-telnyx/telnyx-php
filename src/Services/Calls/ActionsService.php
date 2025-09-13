<?php

declare(strict_types=1);

namespace Telnyx\Services\Calls;

use Telnyx\AI\Assistants\Assistant;
use Telnyx\Calls\Actions\ActionAnswerParams;
use Telnyx\Calls\Actions\ActionAnswerParams\PreferredCodecs;
use Telnyx\Calls\Actions\ActionAnswerParams\Record;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordChannels;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordFormat;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrim;
use Telnyx\Calls\Actions\ActionAnswerParams\StreamTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\WebhookURLMethod;
use Telnyx\Calls\Actions\ActionAnswerResponse;
use Telnyx\Calls\Actions\ActionBridgeParams;
use Telnyx\Calls\Actions\ActionBridgeParams\MuteDtmf;
use Telnyx\Calls\Actions\ActionBridgeParams\Record as Record1;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels as RecordChannels1;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat as RecordFormat1;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack as RecordTrack1;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim as RecordTrim1;
use Telnyx\Calls\Actions\ActionBridgeParams\Ringtone;
use Telnyx\Calls\Actions\ActionBridgeResponse;
use Telnyx\Calls\Actions\ActionEnqueueParams;
use Telnyx\Calls\Actions\ActionEnqueueResponse;
use Telnyx\Calls\Actions\ActionGatherParams;
use Telnyx\Calls\Actions\ActionGatherResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;
use Telnyx\Calls\Actions\ActionGatherUsingAIResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAudioParams;
use Telnyx\Calls\Actions\ActionGatherUsingAudioResponse;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\Language;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\PayloadType;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\ServiceLevel;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakResponse;
use Telnyx\Calls\Actions\ActionHangupParams;
use Telnyx\Calls\Actions\ActionHangupResponse;
use Telnyx\Calls\Actions\ActionLeaveQueueParams;
use Telnyx\Calls\Actions\ActionLeaveQueueResponse;
use Telnyx\Calls\Actions\ActionPauseRecordingParams;
use Telnyx\Calls\Actions\ActionPauseRecordingResponse;
use Telnyx\Calls\Actions\ActionReferParams;
use Telnyx\Calls\Actions\ActionReferResponse;
use Telnyx\Calls\Actions\ActionRejectParams;
use Telnyx\Calls\Actions\ActionRejectParams\Cause;
use Telnyx\Calls\Actions\ActionRejectResponse;
use Telnyx\Calls\Actions\ActionResumeRecordingParams;
use Telnyx\Calls\Actions\ActionResumeRecordingResponse;
use Telnyx\Calls\Actions\ActionSendDtmfParams;
use Telnyx\Calls\Actions\ActionSendDtmfResponse;
use Telnyx\Calls\Actions\ActionSendSipInfoParams;
use Telnyx\Calls\Actions\ActionSendSipInfoResponse;
use Telnyx\Calls\Actions\ActionSpeakParams;
use Telnyx\Calls\Actions\ActionSpeakParams\Language as Language1;
use Telnyx\Calls\Actions\ActionSpeakParams\PayloadType as PayloadType1;
use Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel as ServiceLevel1;
use Telnyx\Calls\Actions\ActionSpeakResponse;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant as Assistant1;
use Telnyx\Calls\Actions\ActionStartAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStartForkingParams;
use Telnyx\Calls\Actions\ActionStartForkingParams\StreamType;
use Telnyx\Calls\Actions\ActionStartForkingResponse;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\Direction;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngine;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStartPlaybackParams;
use Telnyx\Calls\Actions\ActionStartPlaybackParams\AudioType;
use Telnyx\Calls\Actions\ActionStartPlaybackResponse;
use Telnyx\Calls\Actions\ActionStartRecordingParams;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Channels;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Format;
use Telnyx\Calls\Actions\ActionStartRecordingParams\RecordingTrack;
use Telnyx\Calls\Actions\ActionStartRecordingParams\TranscriptionLanguage;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Trim;
use Telnyx\Calls\Actions\ActionStartRecordingResponse;
use Telnyx\Calls\Actions\ActionStartSiprecParams;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SiprecTrack;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SipTransport;
use Telnyx\Calls\Actions\ActionStartSiprecResponse;
use Telnyx\Calls\Actions\ActionStartStreamingParams;
use Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack as StreamTrack1;
use Telnyx\Calls\Actions\ActionStartStreamingResponse;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartTranscriptionResponse;
use Telnyx\Calls\Actions\ActionStopAIAssistantParams;
use Telnyx\Calls\Actions\ActionStopAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStopForkingParams;
use Telnyx\Calls\Actions\ActionStopForkingParams\StreamType as StreamType1;
use Telnyx\Calls\Actions\ActionStopForkingResponse;
use Telnyx\Calls\Actions\ActionStopGatherParams;
use Telnyx\Calls\Actions\ActionStopGatherResponse;
use Telnyx\Calls\Actions\ActionStopNoiseSuppressionParams;
use Telnyx\Calls\Actions\ActionStopNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStopPlaybackParams;
use Telnyx\Calls\Actions\ActionStopPlaybackResponse;
use Telnyx\Calls\Actions\ActionStopRecordingParams;
use Telnyx\Calls\Actions\ActionStopRecordingResponse;
use Telnyx\Calls\Actions\ActionStopSiprecParams;
use Telnyx\Calls\Actions\ActionStopSiprecResponse;
use Telnyx\Calls\Actions\ActionStopStreamingParams;
use Telnyx\Calls\Actions\ActionStopStreamingResponse;
use Telnyx\Calls\Actions\ActionStopTranscriptionParams;
use Telnyx\Calls\Actions\ActionStopTranscriptionResponse;
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams;
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams\Role;
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleResponse;
use Telnyx\Calls\Actions\ActionTransferParams;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf as MuteDtmf1;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod as WebhookURLMethod1;
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateParams;
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
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Calls\ActionsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Answer an incoming call. You must issue this command before executing subsequent commands on an incoming call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/answer-call#callbacks) below):**
     *
     * - `call.answered`
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
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
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used. Currently, transcoding is only supported between PCMU and PCMA codecs.
     * @param StreamTrack|value-of<StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param bool $transcription Enable transcription upon call answer. The default value is false.
     * @param TranscriptionStartRequest $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @return ActionAnswerResponse<HasRawResponse>
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

        return $this->answerRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionAnswerResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function answerRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionAnswerResponse {
        [$parsed, $options] = ActionAnswerParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/answer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionAnswerResponse::class,
        );
    }

    /**
     * @api
     *
     * Bridge two call control calls.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/bridge-call#callbacks) below):**
     *
     * - `call.bridged` for Leg A
     * - `call.bridged` for Leg B
     *
     * @param string $callControlID1 the Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param bool $playRingtone specifies whether to play a ringtone if the call you want to bridge with has not yet been answered
     * @param string $queue The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     * @param Record1|value-of<Record1> $record Start recording automatically after an event. Disabled by default.
     * @param RecordChannels1|value-of<RecordChannels1> $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param RecordFormat1|value-of<RecordFormat1> $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param RecordTrack1|value-of<RecordTrack1> $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param RecordTrim1|value-of<RecordTrim1> $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param Ringtone|value-of<Ringtone> $ringtone Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     * @param string $videoRoomContext The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     * @param string $videoRoomID the ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter
     *
     * @return ActionBridgeResponse<HasRawResponse>
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
    ): ActionBridgeResponse {
        $params = [
            'callControlID' => $callControlID1,
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

        return $this->bridgeRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionBridgeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function bridgeRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionBridgeResponse {
        [$parsed, $options] = ActionBridgeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/bridge', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionBridgeResponse::class,
        );
    }

    /**
     * @api
     *
     * Put the call in a queue.
     *
     * @param string $queueName The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $maxSize The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     * @param int $maxWaitTimeSecs the number of seconds after which the call will be removed from the queue
     *
     * @return ActionEnqueueResponse<HasRawResponse>
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
    ): ActionEnqueueResponse {
        $params = [
            'queueName' => $queueName,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'maxSize' => $maxSize,
            'maxWaitTimeSecs' => $maxWaitTimeSecs,
        ];

        return $this->enqueueRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionEnqueueResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function enqueueRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionEnqueueResponse {
        [$parsed, $options] = ActionEnqueueParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/enqueue', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnqueueResponse::class,
        );
    }

    /**
     * @api
     *
     * Gather DTMF signals to build interactive menus.
     *
     * You can pass a list of valid digits. The `Answer` command must be issued before the `gather` command.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/gather-call#callbacks) below):**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
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
     * @return ActionGatherResponse<HasRawResponse>
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

        return $this->gatherRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionGatherResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function gatherRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGatherResponse {
        [$parsed, $options] = ActionGatherParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherResponse::class,
        );
    }

    /**
     * @api
     *
     * Gather parameters defined in the request payload using a voice assistant.
     *
     *  You can pass parameters described as a JSON Schema object and the voice assistant will attempt to gather these informations.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/call-gather-using-ai#callbacks) below):**
     *
     * - `call.ai_gather.ended`
     * - `call.conversation.ended`
     * - `call.ai_gather.partial_results` (if `send_partial_results` is set to `true`)
     * - `call.ai_gather.message_history_updated` (if `send_message_history_updates` is set to `true`)
     *
     * @param mixed $parameters The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format
     * @param Assistant $assistant assistant configuration including choice of LLM, custom instructions, and tools
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $greeting Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     * @param InterruptionSettings $interruptionSettings Settings for handling user interruptions during assistant speech
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language Language to use for speech recognition
     * @param list<MessageHistory> $messageHistory the message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant
     * @param bool $sendMessageHistoryUpdates Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` [callback](https://developers.telnyx.com/api/call-control/call-gather-using-ai#callbacks) in real time as the message history is updated.
     * @param bool $sendPartialResults Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` [callback](https://developers.telnyx.com/api/call-control/call-gather-using-ai#callbacks) in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
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
     * @return ActionGatherUsingAIResponse<HasRawResponse>
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

        return $this->gatherUsingAIRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionGatherUsingAIResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAIRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGatherUsingAIResponse {
        [$parsed, $options] = ActionGatherUsingAIParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_ai', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingAIResponse::class,
        );
    }

    /**
     * @api
     *
     * Play an audio file on the call until the required DTMF signals are gathered to build interactive menus.
     *
     * You can pass a list of valid digits along with an 'invalid_audio_url', which will be played back at the beginning of each prompt. Playback will be interrupted when a DTMF signal is received. The `Answer command must be issued before the `gather_using_audio` command.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/gather-using-audio#callbacks) below):**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
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
     * @return ActionGatherUsingAudioResponse<HasRawResponse>
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

        return $this->gatherUsingAudioRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionGatherUsingAudioResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAudioRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGatherUsingAudioResponse {
        [$parsed, $options] = ActionGatherUsingAudioParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_audio', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingAudioResponse::class,
        );
    }

    /**
     * @api
     *
     * Convert text to speech and play it on the call until the required DTMF signals are gathered to build interactive menus.
     *
     * You can pass a list of valid digits along with an 'invalid_payload', which will be played back at the beginning of each prompt. Speech will be interrupted when a DTMF signal is received. The `Answer` command must be issued before the `gather_using_speak` command.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/gather-using-speak#callbacks) below):**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
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
     * @return ActionGatherUsingSpeakResponse<HasRawResponse>
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

        return $this->gatherUsingSpeakRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionGatherUsingSpeakResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function gatherUsingSpeakRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGatherUsingSpeakResponse {
        [$parsed, $options] = ActionGatherUsingSpeakParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_speak', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingSpeakResponse::class,
        );
    }

    /**
     * @api
     *
     * Hang up the call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/hangup-call#callbacks) below):**
     *
     * - `call.hangup`
     * - `call.recording.saved`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionHangupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->hangupRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionHangupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function hangupRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionHangupResponse {
        [$parsed, $options] = ActionHangupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/hangup', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionHangupResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes the call from a queue.
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionLeaveQueueResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->leaveQueueRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionLeaveQueueResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function leaveQueueRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionLeaveQueueResponse {
        [$parsed, $options] = ActionLeaveQueueParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/leave_queue', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionLeaveQueueResponse::class,
        );
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
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @return ActionPauseRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];

        return $this->pauseRecordingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionPauseRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function pauseRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionPauseRecordingResponse {
        [$parsed, $options] = ActionPauseRecordingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_pause', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionPauseRecordingResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiate a SIP Refer on a Call Control call. You can initiate a SIP Refer at any point in the duration of a call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/refer-call#callbacks) below):**
     *
     * - `call.refer.started`
     * - `call.refer.completed`
     * - `call.refer.failed`
     *
     * @param string $sipAddress the SIP URI to which the call will be referred to
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param list<CustomSipHeader> $customHeaders custom headers to be added to the SIP INVITE
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @return ActionReferResponse<HasRawResponse>
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

        return $this->referRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionReferResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function referRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionReferResponse {
        [$parsed, $options] = ActionReferParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/refer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionReferResponse::class,
        );
    }

    /**
     * @api
     *
     * Reject an incoming call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/reject-call#callbacks) below):**
     *
     * - `call.hangup`
     *
     * @param Cause|value-of<Cause> $cause cause for call rejection
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionRejectResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        $cause,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse {
        $params = [
            'cause' => $cause,
            'clientState' => $clientState,
            'commandID' => $commandID,
        ];

        return $this->rejectRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionRejectResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function rejectRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionRejectResponse {
        [$parsed, $options] = ActionRejectParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/reject', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionRejectResponse::class,
        );
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
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @return ActionResumeRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];

        return $this->resumeRecordingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionResumeRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function resumeRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionResumeRecordingResponse {
        [$parsed, $options] = ActionResumeRecordingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_resume', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionResumeRecordingResponse::class,
        );
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
     * @param string $digits DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param int $durationMillis Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms
     *
     * @return ActionSendDtmfResponse<HasRawResponse>
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
    ): ActionSendDtmfResponse {
        $params = [
            'digits' => $digits,
            'clientState' => $clientState,
            'commandID' => $commandID,
            'durationMillis' => $durationMillis,
        ];

        return $this->sendDtmfRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionSendDtmfResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendDtmfRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSendDtmfResponse {
        [$parsed, $options] = ActionSendDtmfParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/send_dtmf', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSendDtmfResponse::class,
        );
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
     * @param string $body Content of the SIP INFO
     * @param string $contentType Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionSendSipInfoResponse<HasRawResponse>
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
    ): ActionSendSipInfoResponse {
        $params = [
            'body' => $body,
            'contentType' => $contentType,
            'clientState' => $clientState,
            'commandID' => $commandID,
        ];

        return $this->sendSipInfoRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionSendSipInfoResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendSipInfoRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSendSipInfoResponse {
        [$parsed, $options] = ActionSendSipInfoParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/send_sip_info', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSendSipInfoResponse::class,
        );
    }

    /**
     * @api
     *
     * Convert text to speech and play it back on the call. If multiple speak text commands are issued consecutively, the audio files will be placed in a queue awaiting playback.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/speak-call#callbacks) below):**
     *
     * - `call.speak.started`
     * - `call.speak.ended`
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
     * @param Language1|value-of<Language1> $language The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     * @param PayloadType1|value-of<PayloadType1> $payloadType The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     * @param ServiceLevel1|value-of<ServiceLevel1> $serviceLevel This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     * @param string $stop When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings The settings associated with the voice selected
     *
     * @return ActionSpeakResponse<HasRawResponse>
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

        return $this->speakRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionSpeakResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function speakRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSpeakResponse {
        [$parsed, $options] = ActionSpeakParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/speak', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSpeakResponse::class,
        );
    }

    /**
     * @api
     *
     * Start an AI assistant on the call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/call-start-ai-assistant#callbacks) below):**
     *
     * - `call.conversation.ended`
     * - `call.conversation_insights.generated`
     *
     * @param Assistant1 $assistant AI Assistant configuration
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
     * @return ActionStartAIAssistantResponse<HasRawResponse>
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

        return $this->startAIAssistantRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartAIAssistantResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startAIAssistantRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartAIAssistantResponse {
        [$parsed, $options] = ActionStartAIAssistantParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/ai_assistant_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartAIAssistantResponse::class,
        );
    }

    /**
     * @api
     *
     * Call forking allows you to stream the media from a call to a specific target in realtime.
     * This stream can be used to enable realtime audio analysis to support a
     * variety of use cases, including fraud detection, or the creation of AI-generated audio responses.
     * Requests must specify either the `target` attribute or the `rx` and `tx` attributes.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/start-call-fork#callbacks) below):**
     *
     * - `call.fork.started`
     * - `call.fork.stopped`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $rx the network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded
     * @param StreamType|value-of<StreamType> $streamType Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     * @param string $tx the network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded
     *
     * @return ActionStartForkingResponse<HasRawResponse>
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
    ): ActionStartForkingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'rx' => $rx,
            'streamType' => $streamType,
            'tx' => $tx,
        ];

        return $this->startForkingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartForkingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startForkingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartForkingResponse {
        [$parsed, $options] = ActionStartForkingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/fork_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartForkingResponse::class,
        );
    }

    /**
     * @api
     *
     * Noise Suppression Start (BETA)
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param Direction|value-of<Direction> $direction the direction of the audio stream to be noise suppressed
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noiseSuppressionEngine The engine to use for noise suppression.
     * A - rnnoise engine
     * B - deepfilter engine.
     *
     * @return ActionStartNoiseSuppressionResponse<HasRawResponse>
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
    ): ActionStartNoiseSuppressionResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'direction' => $direction,
            'noiseSuppressionEngine' => $noiseSuppressionEngine,
        ];

        return $this->startNoiseSuppressionRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartNoiseSuppressionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startNoiseSuppressionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartNoiseSuppressionResponse {
        [$parsed, $options] = ActionStartNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/suppression_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartNoiseSuppressionResponse::class,
        );
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
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/start-call-playback#callbacks) below):**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
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
     * @return ActionStartPlaybackResponse<HasRawResponse>
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

        return $this->startPlaybackRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartPlaybackResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startPlaybackRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartPlaybackResponse {
        [$parsed, $options] = ActionStartPlaybackParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/playback_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartPlaybackResponse::class,
        );
    }

    /**
     * @api
     *
     * Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/start-call-record#callbacks) below):**
     *
     * - `call.recording.saved`
     * - `call.recording.transcription.saved`
     * - `call.recording.error`
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
     * @return ActionStartRecordingResponse<HasRawResponse>
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

        return $this->startRecordingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartRecordingResponse {
        [$parsed, $options] = ActionStartRecordingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartRecordingResponse::class,
        );
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
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $connectorName name of configured SIPREC connector to be used
     * @param bool $includeMetadataCustomHeaders When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param bool $secure Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport specifies SIP transport protocol
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack specifies which track should be sent on siprec session
     *
     * @return ActionStartSiprecResponse<HasRawResponse>
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

        return $this->startSiprecRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartSiprecResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startSiprecRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartSiprecResponse {
        [$parsed, $options] = ActionStartSiprecParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/siprec_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartSiprecResponse::class,
        );
    }

    /**
     * @api
     *
     * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
     *
     * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param DialogflowConfig $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used. Currently, transcoding is only supported between PCMU and PCMA codecs.
     * @param StreamTrack1|value-of<StreamTrack1> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     *
     * @return ActionStartStreamingResponse<HasRawResponse>
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
        $streamBidirectionalTargetLegs = omit,
        $streamCodec = omit,
        $streamTrack = omit,
        $streamURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'dialogflowConfig' => $dialogflowConfig,
            'enableDialogflow' => $enableDialogflow,
            'streamBidirectionalCodec' => $streamBidirectionalCodec,
            'streamBidirectionalMode' => $streamBidirectionalMode,
            'streamBidirectionalTargetLegs' => $streamBidirectionalTargetLegs,
            'streamCodec' => $streamCodec,
            'streamTrack' => $streamTrack,
            'streamURL' => $streamURL,
        ];

        return $this->startStreamingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartStreamingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startStreamingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartStreamingResponse {
        [$parsed, $options] = ActionStartStreamingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/streaming_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartStreamingResponse::class,
        );
    }

    /**
     * @api
     *
     * Start real-time transcription. Transcription will stop on call hang-up, or can be initiated via the Transcription stop command.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/start-call-transcription#callbacks) below):**
     *
     * - `call.transcription`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine Engine to use for speech recognition. `A` - `Google`, `B` - `Telnyx`.
     * @param TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig
     * @param string $transcriptionTracks Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     *
     * @return ActionStartTranscriptionResponse<HasRawResponse>
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
    ): ActionStartTranscriptionResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'transcriptionEngine' => $transcriptionEngine,
            'transcriptionEngineConfig' => $transcriptionEngineConfig,
            'transcriptionTracks' => $transcriptionTracks,
        ];

        return $this->startTranscriptionRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStartTranscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function startTranscriptionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStartTranscriptionResponse {
        [$parsed, $options] = ActionStartTranscriptionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transcription_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartTranscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop an AI assistant on the call.
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionStopAIAssistantResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->stopAIAssistantRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopAIAssistantResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopAIAssistantRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopAIAssistantResponse {
        [$parsed, $options] = ActionStopAIAssistantParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/ai_assistant_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopAIAssistantResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop forking a call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-fork#callbacks) below):**
     *
     * - `call.fork.stopped`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param StreamType1|value-of<StreamType1> $streamType Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     *
     * @return ActionStopForkingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $streamType = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'streamType' => $streamType,
        ];

        return $this->stopForkingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopForkingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopForkingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopForkingResponse {
        [$parsed, $options] = ActionStopForkingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/fork_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopForkingResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop current gather.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-gather#callbacks) below):**
     *
     * - `call.gather.ended`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionStopGatherResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->stopGatherRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopGatherResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopGatherRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopGatherResponse {
        [$parsed, $options] = ActionStopGatherParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopGatherResponse::class,
        );
    }

    /**
     * @api
     *
     * Noise Suppression Stop (BETA)
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionStopNoiseSuppressionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->stopNoiseSuppressionRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopNoiseSuppressionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopNoiseSuppressionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopNoiseSuppressionResponse {
        [$parsed, $options] = ActionStopNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/suppression_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopNoiseSuppressionResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop audio being played on the call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-playback#callbacks) below):**
     *
     * - `call.playback.ended` or `call.speak.ended`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param bool $overlay when enabled, it stops the audio being played in the overlay queue
     * @param string $stop Use `current` to stop the current audio being played. Use `all` to stop the current audio file being played and clear all audio files from the queue.
     *
     * @return ActionStopPlaybackResponse<HasRawResponse>
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
    ): ActionStopPlaybackResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'overlay' => $overlay,
            'stop' => $stop,
        ];

        return $this->stopPlaybackRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopPlaybackResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopPlaybackRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopPlaybackResponse {
        [$parsed, $options] = ActionStopPlaybackParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/playback_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopPlaybackResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop recording the call.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-recording#callbacks) below):**
     *
     * - `call.recording.saved`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $recordingID uniquely identifies the resource
     *
     * @return ActionStopRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $recordingID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'recordingID' => $recordingID,
        ];

        return $this->stopRecordingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopRecordingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopRecordingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopRecordingResponse {
        [$parsed, $options] = ActionStopRecordingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopRecordingResponse::class,
        );
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
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionStopSiprecResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->stopSiprecRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopSiprecResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopSiprecRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopSiprecResponse {
        [$parsed, $options] = ActionStopSiprecParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/siprec_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopSiprecResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop streaming a call to a WebSocket.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-streaming#callbacks) below):**
     *
     * - `streaming.stopped`
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     * @param string $streamID Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     *
     * @return ActionStopStreamingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        $streamID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse {
        $params = [
            'clientState' => $clientState,
            'commandID' => $commandID,
            'streamID' => $streamID,
        ];

        return $this->stopStreamingRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopStreamingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopStreamingRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopStreamingResponse {
        [$parsed, $options] = ActionStopStreamingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/streaming_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopStreamingResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop real-time transcription.
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     *
     * @return ActionStopTranscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        $clientState = omit,
        $commandID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse {
        $params = ['clientState' => $clientState, 'commandID' => $commandID];

        return $this->stopTranscriptionRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionStopTranscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopTranscriptionRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopTranscriptionResponse {
        [$parsed, $options] = ActionStopTranscriptionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transcription_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopTranscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Switch the supervisor role for a bridged call. This allows switching between different supervisor modes during an active call
     *
     * @param Role|value-of<Role> $role The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     *
     * @return ActionSwitchSupervisorRoleResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        $role,
        ?RequestOptions $requestOptions = null
    ): ActionSwitchSupervisorRoleResponse {
        $params = ['role' => $role];

        return $this->switchSupervisorRoleRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionSwitchSupervisorRoleResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function switchSupervisorRoleRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSwitchSupervisorRoleResponse {
        [$parsed, $options] = ActionSwitchSupervisorRoleParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/switch_supervisor_role', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSwitchSupervisorRoleResponse::class,
        );
    }

    /**
     * @api
     *
     * Transfer a call to a new destination. If the transfer is unsuccessful, a `call.hangup` webhook for the other call (Leg B) will be sent indicating that the transfer could not be completed. The original call will remain active and may be issued additional commands, potentially transfering the call to an alternate destination.
     *
     * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/transfer-call#callbacks) below):**
     *
     * - `call.initiated`
     * - `call.bridged` to Leg B
     * - `call.answered` or `call.hangup`
     * - `call.machine.detection.ended` if `answering_machine_detection` was requested
     * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
     * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
     * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
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
     * @param MuteDtmf1|value-of<MuteDtmf1> $muteDtmf When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     * @param string $parkAfterUnbridge Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param SoundModifications $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param string $targetLegClientState Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     * @param int $timeLimitSecs Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod1|value-of<WebhookURLMethod1> $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @return ActionTransferResponse<HasRawResponse>
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
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $sipHeaders = omit,
        $sipTransportProtocol = omit,
        $soundModifications = omit,
        $targetLegClientState = omit,
        $timeLimitSecs = omit,
        $timeoutSecs = omit,
        $webhookURL = omit,
        $webhookURLMethod = omit,
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
            'sipAuthPassword' => $sipAuthPassword,
            'sipAuthUsername' => $sipAuthUsername,
            'sipHeaders' => $sipHeaders,
            'sipTransportProtocol' => $sipTransportProtocol,
            'soundModifications' => $soundModifications,
            'targetLegClientState' => $targetLegClientState,
            'timeLimitSecs' => $timeLimitSecs,
            'timeoutSecs' => $timeoutSecs,
            'webhookURL' => $webhookURL,
            'webhookURLMethod' => $webhookURLMethod,
        ];

        return $this->transferRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionTransferResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function transferRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionTransferResponse {
        [$parsed, $options] = ActionTransferParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transfer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionTransferResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates client state
     *
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     *
     * @return ActionUpdateClientStateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        $clientState,
        ?RequestOptions $requestOptions = null
    ): ActionUpdateClientStateResponse {
        $params = ['clientState' => $clientState];

        return $this->updateClientStateRaw(
            $callControlID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionUpdateClientStateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateClientStateRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionUpdateClientStateResponse {
        [$parsed, $options] = ActionUpdateClientStateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['calls/%1$s/actions/client_state_update', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateClientStateResponse::class,
        );
    }
}
