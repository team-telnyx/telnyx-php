<?php

declare(strict_types=1);

namespace Telnyx\Services\Calls;

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
use Telnyx\Calls\Actions\ActionBridgeParams\Ringtone;
use Telnyx\Calls\Actions\ActionBridgeResponse;
use Telnyx\Calls\Actions\ActionEnqueueParams;
use Telnyx\Calls\Actions\ActionEnqueueResponse;
use Telnyx\Calls\Actions\ActionGatherParams;
use Telnyx\Calls\Actions\ActionGatherResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory\Role;
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
use Telnyx\Calls\Actions\ActionSpeakResponse;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams;
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
use Telnyx\Calls\Actions\ActionStartStreamingResponse;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams;
use Telnyx\Calls\Actions\ActionStartTranscriptionResponse;
use Telnyx\Calls\Actions\ActionStopAIAssistantParams;
use Telnyx\Calls\Actions\ActionStopAIAssistantResponse;
use Telnyx\Calls\Actions\ActionStopForkingParams;
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
use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleResponse;
use Telnyx\Calls\Actions\ActionTransferParams;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\SipRegion;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateParams;
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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Calls\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   billingGroupID?: string,
     *   clientState?: string,
     *   commandID?: string,
     *   customHeaders?: list<array{name: string, value: string}|CustomSipHeader>,
     *   preferredCodecs?: 'G722,PCMU,PCMA,G729,OPUS,VP8,H264'|PreferredCodecs,
     *   record?: 'record-from-answer'|Record,
     *   recordChannels?: 'single'|'dual'|RecordChannels,
     *   recordCustomFileName?: string,
     *   recordFormat?: 'wav'|'mp3'|RecordFormat,
     *   recordMaxLength?: int,
     *   recordTimeoutSecs?: int,
     *   recordTrack?: 'both'|'inbound'|'outbound'|RecordTrack,
     *   recordTrim?: 'trim-silence'|RecordTrim,
     *   sendSilenceWhenIdle?: bool,
     *   sipHeaders?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     *   soundModifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   streamBidirectionalCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec,
     *   streamBidirectionalMode?: 'mp3'|'rtp'|StreamBidirectionalMode,
     *   streamBidirectionalTargetLegs?: 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs,
     *   streamCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec,
     *   streamTrack?: 'inbound_track'|'outbound_track'|'both_tracks'|StreamTrack,
     *   streamURL?: string,
     *   transcription?: bool,
     *   transcriptionConfig?: array{
     *     clientState?: string,
     *     commandID?: string,
     *     transcriptionEngine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|TranscriptionEngine,
     *     transcriptionEngineConfig?: array<string,mixed>,
     *     transcriptionTracks?: string,
     *   },
     *   webhookURL?: string,
     *   webhookURLMethod?: 'POST'|'GET'|WebhookURLMethod,
     * }|ActionAnswerParams $params
     *
     * @return BaseResponse<ActionAnswerResponse>
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        array|ActionAnswerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionAnswerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.bridged` for Leg A
     * - `call.bridged` for Leg B
     *
     * @param string $callControlID_ Unique identifier and token for controlling the call
     * @param array{
     *   callControlID: string,
     *   clientState?: string,
     *   commandID?: string,
     *   muteDtmf?: 'none'|'both'|'self'|'opposite'|MuteDtmf,
     *   parkAfterUnbridge?: string,
     *   playRingtone?: bool,
     *   queue?: string,
     *   record?: 'record-from-answer'|ActionBridgeParams\Record,
     *   recordChannels?: 'single'|'dual'|ActionBridgeParams\RecordChannels,
     *   recordCustomFileName?: string,
     *   recordFormat?: 'wav'|'mp3'|ActionBridgeParams\RecordFormat,
     *   recordMaxLength?: int,
     *   recordTimeoutSecs?: int,
     *   recordTrack?: 'both'|'inbound'|'outbound'|ActionBridgeParams\RecordTrack,
     *   recordTrim?: 'trim-silence'|ActionBridgeParams\RecordTrim,
     *   ringtone?: value-of<Ringtone>,
     *   videoRoomContext?: string,
     *   videoRoomID?: string,
     * }|ActionBridgeParams $params
     *
     * @return BaseResponse<ActionBridgeResponse>
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlID_,
        array|ActionBridgeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionBridgeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/bridge', $callControlID_],
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   queueName: string,
     *   clientState?: string,
     *   commandID?: string,
     *   keepAfterHangup?: bool,
     *   maxSize?: int,
     *   maxWaitTimeSecs?: int,
     * }|ActionEnqueueParams $params
     *
     * @return BaseResponse<ActionEnqueueResponse>
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        array|ActionEnqueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionEnqueueParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   gatherID?: string,
     *   initialTimeoutMillis?: int,
     *   interDigitTimeoutMillis?: int,
     *   maximumDigits?: int,
     *   minimumDigits?: int,
     *   terminatingDigit?: string,
     *   timeoutMillis?: int,
     *   validDigits?: string,
     * }|ActionGatherParams $params
     *
     * @return BaseResponse<ActionGatherResponse>
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        array|ActionGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGatherParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.ai_gather.ended`
     * - `call.conversation.ended`
     * - `call.ai_gather.partial_results` (if `send_partial_results` is set to `true`)
     * - `call.ai_gather.message_history_updated` (if `send_message_history_updates` is set to `true`)
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   parameters: mixed,
     *   assistant?: array{
     *     instructions?: string,
     *     model?: string,
     *     openaiAPIKeyRef?: string,
     *     tools?: list<array<string,mixed>>,
     *   },
     *   clientState?: string,
     *   commandID?: string,
     *   greeting?: string,
     *   interruptionSettings?: array{enable?: bool},
     *   language?: value-of<GoogleTranscriptionLanguage>,
     *   messageHistory?: list<array{
     *     content?: string, role?: 'assistant'|'user'|Role
     *   }>,
     *   sendMessageHistoryUpdates?: bool,
     *   sendPartialResults?: bool,
     *   transcription?: array{model?: string},
     *   userResponseTimeoutMs?: int,
     *   voice?: string,
     *   voiceSettings?: array<string,mixed>,
     * }|ActionGatherUsingAIParams $params
     *
     * @return BaseResponse<ActionGatherUsingAIResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array|ActionGatherUsingAIParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGatherUsingAIParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   audioURL?: string,
     *   clientState?: string,
     *   commandID?: string,
     *   interDigitTimeoutMillis?: int,
     *   invalidAudioURL?: string,
     *   invalidMediaName?: string,
     *   maximumDigits?: int,
     *   maximumTries?: int,
     *   mediaName?: string,
     *   minimumDigits?: int,
     *   terminatingDigit?: string,
     *   timeoutMillis?: int,
     *   validDigits?: string,
     * }|ActionGatherUsingAudioParams $params
     *
     * @return BaseResponse<ActionGatherUsingAudioResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        array|ActionGatherUsingAudioParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGatherUsingAudioParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.dtmf.received` (you may receive many of these webhooks)
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   payload: string,
     *   voice: string,
     *   clientState?: string,
     *   commandID?: string,
     *   interDigitTimeoutMillis?: int,
     *   invalidPayload?: string,
     *   language?: value-of<Language>,
     *   maximumDigits?: int,
     *   maximumTries?: int,
     *   minimumDigits?: int,
     *   payloadType?: 'text'|'ssml'|PayloadType,
     *   serviceLevel?: 'basic'|'premium'|ServiceLevel,
     *   terminatingDigit?: string,
     *   timeoutMillis?: int,
     *   validDigits?: string,
     *   voiceSettings?: array<string,mixed>,
     * }|ActionGatherUsingSpeakParams $params
     *
     * @return BaseResponse<ActionGatherUsingSpeakResponse>
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        array|ActionGatherUsingSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGatherUsingSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.hangup`
     * - `call.recording.saved`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionHangupParams $params
     *
     * @return BaseResponse<ActionHangupResponse>
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        array|ActionHangupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionHangupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionLeaveQueueParams $params
     *
     * @return BaseResponse<ActionLeaveQueueResponse>
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        array|ActionLeaveQueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionLeaveQueueParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string, recordingID?: string
     * }|ActionPauseRecordingParams $params
     *
     * @return BaseResponse<ActionPauseRecordingResponse>
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        array|ActionPauseRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionPauseRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.refer.started`
     * - `call.refer.completed`
     * - `call.refer.failed`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   sipAddress: string,
     *   clientState?: string,
     *   commandID?: string,
     *   customHeaders?: list<array{name: string, value: string}|CustomSipHeader>,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipHeaders?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     * }|ActionReferParams $params
     *
     * @return BaseResponse<ActionReferResponse>
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        array|ActionReferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionReferParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.hangup`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   cause: 'CALL_REJECTED'|'USER_BUSY'|Cause,
     *   clientState?: string,
     *   commandID?: string,
     * }|ActionRejectParams $params
     *
     * @return BaseResponse<ActionRejectResponse>
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        array|ActionRejectParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRejectParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string, recordingID?: string
     * }|ActionResumeRecordingParams $params
     *
     * @return BaseResponse<ActionResumeRecordingResponse>
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        array|ActionResumeRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionResumeRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   digits: string, clientState?: string, commandID?: string, durationMillis?: int
     * }|ActionSendDtmfParams $params
     *
     * @return BaseResponse<ActionSendDtmfResponse>
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        array|ActionSendDtmfParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSendDtmfParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   body: string, contentType: string, clientState?: string, commandID?: string
     * }|ActionSendSipInfoParams $params
     *
     * @return BaseResponse<ActionSendSipInfoResponse>
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        array|ActionSendSipInfoParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSendSipInfoParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.speak.started`
     * - `call.speak.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   payload: string,
     *   voice: string,
     *   clientState?: string,
     *   commandID?: string,
     *   language?: value-of<ActionSpeakParams\Language>,
     *   payloadType?: 'text'|'ssml'|ActionSpeakParams\PayloadType,
     *   serviceLevel?: 'basic'|'premium'|ActionSpeakParams\ServiceLevel,
     *   stop?: string,
     *   voiceSettings?: array<string,mixed>,
     * }|ActionSpeakParams $params
     *
     * @return BaseResponse<ActionSpeakResponse>
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        array|ActionSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.conversation.ended`
     * - `call.conversation_insights.generated`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   assistant?: array{
     *     id?: string, instructions?: string, openaiAPIKeyRef?: string
     *   },
     *   clientState?: string,
     *   commandID?: string,
     *   greeting?: string,
     *   interruptionSettings?: array{enable?: bool},
     *   transcription?: array{model?: string},
     *   voice?: string,
     *   voiceSettings?: array<string,mixed>,
     * }|ActionStartAIAssistantParams $params
     *
     * @return BaseResponse<ActionStartAIAssistantResponse>
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        array|ActionStartAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartAIAssistantParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.fork.started`
     * - `call.fork.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   rx?: string,
     *   streamType?: 'decrypted'|StreamType,
     *   tx?: string,
     * }|ActionStartForkingParams $params
     *
     * @return BaseResponse<ActionStartForkingResponse>
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        array|ActionStartForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartForkingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   direction?: 'inbound'|'outbound'|'both'|Direction,
     *   noiseSuppressionEngine?: 'Denoiser'|'DeepFilterNet'|NoiseSuppressionEngine,
     *   noiseSuppressionEngineConfig?: array{attenuationLimit?: int},
     * }|ActionStartNoiseSuppressionParams $params
     *
     * @return BaseResponse<ActionStartNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        array|ActionStartNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.playback.started`
     * - `call.playback.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   audioType?: 'mp3'|'wav'|AudioType,
     *   audioURL?: string,
     *   cacheAudio?: bool,
     *   clientState?: string,
     *   commandID?: string,
     *   loop?: string|int,
     *   mediaName?: string,
     *   overlay?: bool,
     *   playbackContent?: string,
     *   stop?: string,
     *   targetLegs?: string,
     * }|ActionStartPlaybackParams $params
     *
     * @return BaseResponse<ActionStartPlaybackResponse>
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        array|ActionStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartPlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.recording.saved`
     * - `call.recording.transcription.saved`
     * - `call.recording.error`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   channels: 'single'|'dual'|Channels,
     *   format: 'wav'|'mp3'|Format,
     *   clientState?: string,
     *   commandID?: string,
     *   customFileName?: string,
     *   maxLength?: int,
     *   playBeep?: bool,
     *   recordingTrack?: 'both'|'inbound'|'outbound'|RecordingTrack,
     *   timeoutSecs?: int,
     *   transcription?: bool,
     *   transcriptionEngine?: string,
     *   transcriptionLanguage?: value-of<TranscriptionLanguage>,
     *   transcriptionMaxSpeakerCount?: int,
     *   transcriptionMinSpeakerCount?: int,
     *   transcriptionProfanityFilter?: bool,
     *   transcriptionSpeakerDiarization?: bool,
     *   trim?: 'trim-silence'|Trim,
     * }|ActionStartRecordingParams $params
     *
     * @return BaseResponse<ActionStartRecordingResponse>
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        array|ActionStartRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   connectorName?: string,
     *   includeMetadataCustomHeaders?: bool,
     *   secure?: bool,
     *   sessionTimeoutSecs?: int,
     *   sipTransport?: 'udp'|'tcp'|'tls'|SipTransport,
     *   siprecTrack?: 'inbound_track'|'outbound_track'|'both_tracks'|SiprecTrack,
     * }|ActionStartSiprecParams $params
     *
     * @return BaseResponse<ActionStartSiprecResponse>
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        array|ActionStartSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartSiprecParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   dialogflowConfig?: array{
     *     analyzeSentiment?: bool, partialAutomatedAgentReply?: bool
     *   },
     *   enableDialogflow?: bool,
     *   streamBidirectionalCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec,
     *   streamBidirectionalMode?: 'mp3'|'rtp'|StreamBidirectionalMode,
     *   streamBidirectionalSamplingRate?: 8000|16000|22050|24000|48000|StreamBidirectionalSamplingRate,
     *   streamBidirectionalTargetLegs?: 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs,
     *   streamCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec,
     *   streamTrack?: 'inbound_track'|'outbound_track'|'both_tracks'|ActionStartStreamingParams\StreamTrack,
     *   streamURL?: string,
     * }|ActionStartStreamingParams $params
     *
     * @return BaseResponse<ActionStartStreamingResponse>
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        array|ActionStartStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartStreamingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.transcription`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   transcriptionEngine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|ActionStartTranscriptionParams\TranscriptionEngine,
     *   transcriptionEngineConfig?: array<string,mixed>,
     *   transcriptionTracks?: string,
     * }|ActionStartTranscriptionParams $params
     *
     * @return BaseResponse<ActionStartTranscriptionResponse>
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        array|ActionStartTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStartTranscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionStopAIAssistantParams $params
     *
     * @return BaseResponse<ActionStopAIAssistantResponse>
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        array|ActionStopAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopAIAssistantParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.fork.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   streamType?: 'raw'|'decrypted'|ActionStopForkingParams\StreamType,
     * }|ActionStopForkingParams $params
     *
     * @return BaseResponse<ActionStopForkingResponse>
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        array|ActionStopForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopForkingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.gather.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionStopGatherParams $params
     *
     * @return BaseResponse<ActionStopGatherResponse>
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        array|ActionStopGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopGatherParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionStopNoiseSuppressionParams $params
     *
     * @return BaseResponse<ActionStopNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        array|ActionStopNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.playback.ended` or `call.speak.ended`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string, overlay?: bool, stop?: string
     * }|ActionStopPlaybackParams $params
     *
     * @return BaseResponse<ActionStopPlaybackResponse>
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        array|ActionStopPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopPlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `call.recording.saved`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string, recordingID?: string
     * }|ActionStopRecordingParams $params
     *
     * @return BaseResponse<ActionStopRecordingResponse>
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        array|ActionStopRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionStopSiprecParams $params
     *
     * @return BaseResponse<ActionStopSiprecResponse>
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        array|ActionStopSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopSiprecParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * **Expected Webhooks:**
     *
     * - `streaming.stopped`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string, streamID?: string
     * }|ActionStopStreamingParams $params
     *
     * @return BaseResponse<ActionStopStreamingResponse>
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        array|ActionStopStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopStreamingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   clientState?: string, commandID?: string
     * }|ActionStopTranscriptionParams $params
     *
     * @return BaseResponse<ActionStopTranscriptionResponse>
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        array|ActionStopTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopTranscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{
     *   role: 'barge'|'whisper'|'monitor'|ActionSwitchSupervisorRoleParams\Role,
     * }|ActionSwitchSupervisorRoleParams $params
     *
     * @return BaseResponse<ActionSwitchSupervisorRoleResponse>
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        array|ActionSwitchSupervisorRoleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSwitchSupervisorRoleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   to: string,
     *   answeringMachineDetection?: 'premium'|'detect'|'detect_beep'|'detect_words'|'greeting_end'|'disabled'|AnsweringMachineDetection,
     *   answeringMachineDetectionConfig?: array{
     *     afterGreetingSilenceMillis?: int,
     *     betweenWordsSilenceMillis?: int,
     *     greetingDurationMillis?: int,
     *     greetingSilenceDurationMillis?: int,
     *     greetingTotalAnalysisTimeMillis?: int,
     *     initialSilenceMillis?: int,
     *     maximumNumberOfWords?: int,
     *     maximumWordLengthMillis?: int,
     *     silenceThreshold?: int,
     *     totalAnalysisTimeMillis?: int,
     *   },
     *   audioURL?: string,
     *   clientState?: string,
     *   commandID?: string,
     *   customHeaders?: list<array{name: string, value: string}|CustomSipHeader>,
     *   earlyMedia?: bool,
     *   from?: string,
     *   fromDisplayName?: string,
     *   mediaEncryption?: 'disabled'|'SRTP'|'DTLS'|MediaEncryption,
     *   mediaName?: string,
     *   muteDtmf?: 'none'|'both'|'self'|'opposite'|ActionTransferParams\MuteDtmf,
     *   parkAfterUnbridge?: string,
     *   record?: 'record-from-answer'|ActionTransferParams\Record,
     *   recordChannels?: 'single'|'dual'|ActionTransferParams\RecordChannels,
     *   recordCustomFileName?: string,
     *   recordFormat?: 'wav'|'mp3'|ActionTransferParams\RecordFormat,
     *   recordMaxLength?: int,
     *   recordTimeoutSecs?: int,
     *   recordTrack?: 'both'|'inbound'|'outbound'|ActionTransferParams\RecordTrack,
     *   recordTrim?: 'trim-silence'|ActionTransferParams\RecordTrim,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipHeaders?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     *   sipRegion?: 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion,
     *   sipTransportProtocol?: 'UDP'|'TCP'|'TLS'|SipTransportProtocol,
     *   soundModifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   targetLegClientState?: string,
     *   timeLimitSecs?: int,
     *   timeoutSecs?: int,
     *   webhookURL?: string,
     *   webhookURLMethod?: 'POST'|'GET'|ActionTransferParams\WebhookURLMethod,
     * }|ActionTransferParams $params
     *
     * @return BaseResponse<ActionTransferResponse>
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        array|ActionTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{clientState: string}|ActionUpdateClientStateParams $params
     *
     * @return BaseResponse<ActionUpdateClientStateResponse>
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        array|ActionUpdateClientStateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUpdateClientStateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['calls/%1$s/actions/client_state_update', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateClientStateResponse::class,
        );
    }
}
