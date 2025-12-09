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
use Telnyx\ServiceContracts\Calls\ActionsContract;

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
     * **Expected Webhooks:**
     *
     * - `call.answered`
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
     *
     * @param array{
     *   billing_group_id?: string,
     *   client_state?: string,
     *   command_id?: string,
     *   custom_headers?: list<array{name: string, value: string}|CustomSipHeader>,
     *   preferred_codecs?: 'G722,PCMU,PCMA,G729,OPUS,VP8,H264'|PreferredCodecs,
     *   record?: 'record-from-answer'|Record,
     *   record_channels?: 'single'|'dual'|RecordChannels,
     *   record_custom_file_name?: string,
     *   record_format?: 'wav'|'mp3'|RecordFormat,
     *   record_max_length?: int,
     *   record_timeout_secs?: int,
     *   record_track?: 'both'|'inbound'|'outbound'|RecordTrack,
     *   record_trim?: 'trim-silence'|RecordTrim,
     *   send_silence_when_idle?: bool,
     *   sip_headers?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     *   sound_modifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   stream_bidirectional_codec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec,
     *   stream_bidirectional_mode?: 'mp3'|'rtp'|StreamBidirectionalMode,
     *   stream_bidirectional_target_legs?: 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs,
     *   stream_codec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec,
     *   stream_track?: 'inbound_track'|'outbound_track'|'both_tracks'|StreamTrack,
     *   stream_url?: string,
     *   transcription?: bool,
     *   transcription_config?: array{
     *     client_state?: string,
     *     command_id?: string,
     *     transcription_engine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|TranscriptionEngine,
     *     transcription_engine_config?: array<string,mixed>,
     *     transcription_tracks?: string,
     *   },
     *   webhook_url?: string,
     *   webhook_url_method?: 'POST'|'GET'|WebhookURLMethod,
     * }|ActionAnswerParams $params
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        array|ActionAnswerParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionAnswerResponse {
        [$parsed, $options] = ActionAnswerParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionAnswerResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/answer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionAnswerResponse::class,
        );

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
     * @param array{
     *   call_control_id: string,
     *   client_state?: string,
     *   command_id?: string,
     *   mute_dtmf?: 'none'|'both'|'self'|'opposite'|MuteDtmf,
     *   park_after_unbridge?: string,
     *   play_ringtone?: bool,
     *   queue?: string,
     *   record?: 'record-from-answer'|ActionBridgeParams\Record,
     *   record_channels?: 'single'|'dual'|ActionBridgeParams\RecordChannels,
     *   record_custom_file_name?: string,
     *   record_format?: 'wav'|'mp3'|ActionBridgeParams\RecordFormat,
     *   record_max_length?: int,
     *   record_timeout_secs?: int,
     *   record_track?: 'both'|'inbound'|'outbound'|ActionBridgeParams\RecordTrack,
     *   record_trim?: 'trim-silence'|ActionBridgeParams\RecordTrim,
     *   ringtone?: value-of<Ringtone>,
     *   video_room_context?: string,
     *   video_room_id?: string,
     * }|ActionBridgeParams $params
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlID,
        array|ActionBridgeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionBridgeResponse {
        [$parsed, $options] = ActionBridgeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionBridgeResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/bridge', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionBridgeResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Put the call in a queue.
     *
     * @param array{
     *   queue_name: string,
     *   client_state?: string,
     *   command_id?: string,
     *   keep_after_hangup?: bool,
     *   max_size?: int,
     *   max_wait_time_secs?: int,
     * }|ActionEnqueueParams $params
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        array|ActionEnqueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnqueueResponse {
        [$parsed, $options] = ActionEnqueueParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionEnqueueResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/enqueue', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnqueueResponse::class,
        );

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
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   gather_id?: string,
     *   initial_timeout_millis?: int,
     *   inter_digit_timeout_millis?: int,
     *   maximum_digits?: int,
     *   minimum_digits?: int,
     *   terminating_digit?: string,
     *   timeout_millis?: int,
     *   valid_digits?: string,
     * }|ActionGatherParams $params
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        array|ActionGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherResponse {
        [$parsed, $options] = ActionGatherParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionGatherResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherResponse::class,
        );

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
     * @param array{
     *   parameters: mixed,
     *   assistant?: array{
     *     instructions?: string,
     *     model?: string,
     *     openai_api_key_ref?: string,
     *     tools?: list<array<string,mixed>>,
     *   },
     *   client_state?: string,
     *   command_id?: string,
     *   greeting?: string,
     *   interruption_settings?: array{enable?: bool},
     *   language?: value-of<GoogleTranscriptionLanguage>,
     *   message_history?: list<array{
     *     content?: string, role?: 'assistant'|'user'|Role
     *   }>,
     *   send_message_history_updates?: bool,
     *   send_partial_results?: bool,
     *   transcription?: array{model?: string},
     *   user_response_timeout_ms?: int,
     *   voice?: string,
     *   voice_settings?: array<string,mixed>,
     * }|ActionGatherUsingAIParams $params
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array|ActionGatherUsingAIParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAIResponse {
        [$parsed, $options] = ActionGatherUsingAIParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionGatherUsingAIResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_ai', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingAIResponse::class,
        );

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
     * @param array{
     *   audio_url?: string,
     *   client_state?: string,
     *   command_id?: string,
     *   inter_digit_timeout_millis?: int,
     *   invalid_audio_url?: string,
     *   invalid_media_name?: string,
     *   maximum_digits?: int,
     *   maximum_tries?: int,
     *   media_name?: string,
     *   minimum_digits?: int,
     *   terminating_digit?: string,
     *   timeout_millis?: int,
     *   valid_digits?: string,
     * }|ActionGatherUsingAudioParams $params
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        array|ActionGatherUsingAudioParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAudioResponse {
        [$parsed, $options] = ActionGatherUsingAudioParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionGatherUsingAudioResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_audio', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingAudioResponse::class,
        );

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
     * @param array{
     *   payload: string,
     *   voice: string,
     *   client_state?: string,
     *   command_id?: string,
     *   inter_digit_timeout_millis?: int,
     *   invalid_payload?: string,
     *   language?: value-of<Language>,
     *   maximum_digits?: int,
     *   maximum_tries?: int,
     *   minimum_digits?: int,
     *   payload_type?: 'text'|'ssml'|PayloadType,
     *   service_level?: 'basic'|'premium'|ServiceLevel,
     *   terminating_digit?: string,
     *   timeout_millis?: int,
     *   valid_digits?: string,
     *   voice_settings?: array<string,mixed>,
     * }|ActionGatherUsingSpeakParams $params
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        array|ActionGatherUsingSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingSpeakResponse {
        [$parsed, $options] = ActionGatherUsingSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionGatherUsingSpeakResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_using_speak', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGatherUsingSpeakResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionHangupParams $params
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        array|ActionHangupParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse {
        [$parsed, $options] = ActionHangupParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionHangupResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/hangup', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionHangupResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes the call from a queue.
     *
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionLeaveQueueParams $params
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        array|ActionLeaveQueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse {
        [$parsed, $options] = ActionLeaveQueueParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionLeaveQueueResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/leave_queue', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionLeaveQueueResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string, recording_id?: string
     * }|ActionPauseRecordingParams $params
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        array|ActionPauseRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse {
        [$parsed, $options] = ActionPauseRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionPauseRecordingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_pause', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionPauseRecordingResponse::class,
        );

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
     * @param array{
     *   sip_address: string,
     *   client_state?: string,
     *   command_id?: string,
     *   custom_headers?: list<array{name: string, value: string}|CustomSipHeader>,
     *   sip_auth_password?: string,
     *   sip_auth_username?: string,
     *   sip_headers?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     * }|ActionReferParams $params
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        array|ActionReferParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionReferResponse {
        [$parsed, $options] = ActionReferParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionReferResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/refer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionReferResponse::class,
        );

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
     * @param array{
     *   cause: 'CALL_REJECTED'|'USER_BUSY'|Cause,
     *   client_state?: string,
     *   command_id?: string,
     * }|ActionRejectParams $params
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        array|ActionRejectParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse {
        [$parsed, $options] = ActionRejectParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionRejectResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/reject', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionRejectResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string, recording_id?: string
     * }|ActionResumeRecordingParams $params
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        array|ActionResumeRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse {
        [$parsed, $options] = ActionResumeRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionResumeRecordingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_resume', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionResumeRecordingResponse::class,
        );

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
     * @param array{
     *   digits: string,
     *   client_state?: string,
     *   command_id?: string,
     *   duration_millis?: int,
     * }|ActionSendDtmfParams $params
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        array|ActionSendDtmfParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendDtmfResponse {
        [$parsed, $options] = ActionSendDtmfParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionSendDtmfResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/send_dtmf', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSendDtmfResponse::class,
        );

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
     * @param array{
     *   body: string, content_type: string, client_state?: string, command_id?: string
     * }|ActionSendSipInfoParams $params
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        array|ActionSendSipInfoParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendSipInfoResponse {
        [$parsed, $options] = ActionSendSipInfoParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionSendSipInfoResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/send_sip_info', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSendSipInfoResponse::class,
        );

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
     * @param array{
     *   payload: string,
     *   voice: string,
     *   client_state?: string,
     *   command_id?: string,
     *   language?: value-of<ActionSpeakParams\Language>,
     *   payload_type?: 'text'|'ssml'|ActionSpeakParams\PayloadType,
     *   service_level?: 'basic'|'premium'|ActionSpeakParams\ServiceLevel,
     *   stop?: string,
     *   voice_settings?: array<string,mixed>,
     * }|ActionSpeakParams $params
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        array|ActionSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse {
        [$parsed, $options] = ActionSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionSpeakResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/speak', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSpeakResponse::class,
        );

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
     * @param array{
     *   assistant?: array{
     *     id?: string, instructions?: string, openai_api_key_ref?: string
     *   },
     *   client_state?: string,
     *   command_id?: string,
     *   greeting?: string,
     *   interruption_settings?: array{enable?: bool},
     *   transcription?: array{model?: string},
     *   voice?: string,
     *   voice_settings?: array<string,mixed>,
     * }|ActionStartAIAssistantParams $params
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        array|ActionStartAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartAIAssistantResponse {
        [$parsed, $options] = ActionStartAIAssistantParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartAIAssistantResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/ai_assistant_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartAIAssistantResponse::class,
        );

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
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   rx?: string,
     *   stream_type?: 'decrypted'|StreamType,
     *   tx?: string,
     * }|ActionStartForkingParams $params
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        array|ActionStartForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartForkingResponse {
        [$parsed, $options] = ActionStartForkingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartForkingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/fork_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartForkingResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Noise Suppression Start (BETA)
     *
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   direction?: 'inbound'|'outbound'|'both'|Direction,
     *   noise_suppression_engine?: 'Denoiser'|'DeepFilterNet'|NoiseSuppressionEngine,
     *   noise_suppression_engine_config?: array{attenuation_limit?: int},
     * }|ActionStartNoiseSuppressionParams $params
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        array|ActionStartNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse {
        [$parsed, $options] = ActionStartNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartNoiseSuppressionResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/suppression_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartNoiseSuppressionResponse::class,
        );

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
     * @param array{
     *   audio_type?: 'mp3'|'wav'|AudioType,
     *   audio_url?: string,
     *   cache_audio?: bool,
     *   client_state?: string,
     *   command_id?: string,
     *   loop?: string|int,
     *   media_name?: string,
     *   overlay?: bool,
     *   playback_content?: string,
     *   stop?: string,
     *   target_legs?: string,
     * }|ActionStartPlaybackParams $params
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        array|ActionStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartPlaybackResponse {
        [$parsed, $options] = ActionStartPlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartPlaybackResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/playback_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartPlaybackResponse::class,
        );

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
     * @param array{
     *   channels: 'single'|'dual'|Channels,
     *   format: 'wav'|'mp3'|Format,
     *   client_state?: string,
     *   command_id?: string,
     *   custom_file_name?: string,
     *   max_length?: int,
     *   play_beep?: bool,
     *   recording_track?: 'both'|'inbound'|'outbound'|RecordingTrack,
     *   timeout_secs?: int,
     *   transcription?: bool,
     *   transcription_engine?: string,
     *   transcription_language?: value-of<TranscriptionLanguage>,
     *   transcription_max_speaker_count?: int,
     *   transcription_min_speaker_count?: int,
     *   transcription_profanity_filter?: bool,
     *   transcription_speaker_diarization?: bool,
     *   trim?: 'trim-silence'|Trim,
     * }|ActionStartRecordingParams $params
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        array|ActionStartRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartRecordingResponse {
        [$parsed, $options] = ActionStartRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartRecordingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartRecordingResponse::class,
        );

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
     * @param array{
     *   client_state?: string,
     *   connector_name?: string,
     *   include_metadata_custom_headers?: bool,
     *   secure?: bool,
     *   session_timeout_secs?: int,
     *   sip_transport?: 'udp'|'tcp'|'tls'|SipTransport,
     *   siprec_track?: 'inbound_track'|'outbound_track'|'both_tracks'|SiprecTrack,
     * }|ActionStartSiprecParams $params
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        array|ActionStartSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartSiprecResponse {
        [$parsed, $options] = ActionStartSiprecParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartSiprecResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/siprec_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartSiprecResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
     *
     * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
     *
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   dialogflow_config?: array{
     *     analyze_sentiment?: bool, partial_automated_agent_reply?: bool
     *   },
     *   enable_dialogflow?: bool,
     *   stream_bidirectional_codec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec,
     *   stream_bidirectional_mode?: 'mp3'|'rtp'|StreamBidirectionalMode,
     *   stream_bidirectional_sampling_rate?: 8000|16000|22050|24000|48000|StreamBidirectionalSamplingRate,
     *   stream_bidirectional_target_legs?: 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs,
     *   stream_codec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec,
     *   stream_track?: 'inbound_track'|'outbound_track'|'both_tracks'|ActionStartStreamingParams\StreamTrack,
     *   stream_url?: string,
     * }|ActionStartStreamingParams $params
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        array|ActionStartStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse {
        [$parsed, $options] = ActionStartStreamingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartStreamingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/streaming_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartStreamingResponse::class,
        );

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
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   transcription_engine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|ActionStartTranscriptionParams\TranscriptionEngine,
     *   transcription_engine_config?: array<string,mixed>,
     *   transcription_tracks?: string,
     * }|ActionStartTranscriptionParams $params
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        array|ActionStartTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartTranscriptionResponse {
        [$parsed, $options] = ActionStartTranscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStartTranscriptionResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transcription_start', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStartTranscriptionResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop an AI assistant on the call.
     *
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionStopAIAssistantParams $params
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        array|ActionStopAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse {
        [$parsed, $options] = ActionStopAIAssistantParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopAIAssistantResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/ai_assistant_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopAIAssistantResponse::class,
        );

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
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   stream_type?: 'raw'|'decrypted'|ActionStopForkingParams\StreamType,
     * }|ActionStopForkingParams $params
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        array|ActionStopForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse {
        [$parsed, $options] = ActionStopForkingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopForkingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/fork_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopForkingResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionStopGatherParams $params
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        array|ActionStopGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse {
        [$parsed, $options] = ActionStopGatherParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopGatherResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/gather_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopGatherResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Noise Suppression Stop (BETA)
     *
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionStopNoiseSuppressionParams $params
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        array|ActionStopNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse {
        [$parsed, $options] = ActionStopNoiseSuppressionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopNoiseSuppressionResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/suppression_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopNoiseSuppressionResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string, overlay?: bool, stop?: string
     * }|ActionStopPlaybackParams $params
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        array|ActionStopPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopPlaybackResponse {
        [$parsed, $options] = ActionStopPlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopPlaybackResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/playback_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopPlaybackResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string, recording_id?: string
     * }|ActionStopRecordingParams $params
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        array|ActionStopRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse {
        [$parsed, $options] = ActionStopRecordingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopRecordingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/record_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopRecordingResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionStopSiprecParams $params
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        array|ActionStopSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse {
        [$parsed, $options] = ActionStopSiprecParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopSiprecResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/siprec_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopSiprecResponse::class,
        );

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
     * @param array{
     *   client_state?: string, command_id?: string, stream_id?: string
     * }|ActionStopStreamingParams $params
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        array|ActionStopStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse {
        [$parsed, $options] = ActionStopStreamingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopStreamingResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/streaming_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopStreamingResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop real-time transcription.
     *
     * @param array{
     *   client_state?: string, command_id?: string
     * }|ActionStopTranscriptionParams $params
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        array|ActionStopTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse {
        [$parsed, $options] = ActionStopTranscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopTranscriptionResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transcription_stop', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopTranscriptionResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Switch the supervisor role for a bridged call. This allows switching between different supervisor modes during an active call
     *
     * @param array{
     *   role: 'barge'|'whisper'|'monitor'|ActionSwitchSupervisorRoleParams\Role,
     * }|ActionSwitchSupervisorRoleParams $params
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        array|ActionSwitchSupervisorRoleParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSwitchSupervisorRoleResponse {
        [$parsed, $options] = ActionSwitchSupervisorRoleParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionSwitchSupervisorRoleResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/switch_supervisor_role', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionSwitchSupervisorRoleResponse::class,
        );

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
     * @param array{
     *   to: string,
     *   answering_machine_detection?: 'premium'|'detect'|'detect_beep'|'detect_words'|'greeting_end'|'disabled'|AnsweringMachineDetection,
     *   answering_machine_detection_config?: array{
     *     after_greeting_silence_millis?: int,
     *     between_words_silence_millis?: int,
     *     greeting_duration_millis?: int,
     *     greeting_silence_duration_millis?: int,
     *     greeting_total_analysis_time_millis?: int,
     *     initial_silence_millis?: int,
     *     maximum_number_of_words?: int,
     *     maximum_word_length_millis?: int,
     *     silence_threshold?: int,
     *     total_analysis_time_millis?: int,
     *   },
     *   audio_url?: string,
     *   client_state?: string,
     *   command_id?: string,
     *   custom_headers?: list<array{name: string, value: string}|CustomSipHeader>,
     *   early_media?: bool,
     *   from?: string,
     *   from_display_name?: string,
     *   media_encryption?: 'disabled'|'SRTP'|'DTLS'|MediaEncryption,
     *   media_name?: string,
     *   mute_dtmf?: 'none'|'both'|'self'|'opposite'|ActionTransferParams\MuteDtmf,
     *   park_after_unbridge?: string,
     *   record?: 'record-from-answer'|ActionTransferParams\Record,
     *   record_channels?: 'single'|'dual'|ActionTransferParams\RecordChannels,
     *   record_custom_file_name?: string,
     *   record_format?: 'wav'|'mp3'|ActionTransferParams\RecordFormat,
     *   record_max_length?: int,
     *   record_timeout_secs?: int,
     *   record_track?: 'both'|'inbound'|'outbound'|ActionTransferParams\RecordTrack,
     *   record_trim?: 'trim-silence'|ActionTransferParams\RecordTrim,
     *   sip_auth_password?: string,
     *   sip_auth_username?: string,
     *   sip_headers?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     *   sip_region?: 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion,
     *   sip_transport_protocol?: 'UDP'|'TCP'|'TLS'|SipTransportProtocol,
     *   sound_modifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   target_leg_client_state?: string,
     *   time_limit_secs?: int,
     *   timeout_secs?: int,
     *   webhook_url?: string,
     *   webhook_url_method?: 'POST'|'GET'|ActionTransferParams\WebhookURLMethod,
     * }|ActionTransferParams $params
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        array|ActionTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionTransferResponse {
        [$parsed, $options] = ActionTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionTransferResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['calls/%1$s/actions/transfer', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionTransferResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates client state
     *
     * @param array{client_state: string}|ActionUpdateClientStateParams $params
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        array|ActionUpdateClientStateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateClientStateResponse {
        [$parsed, $options] = ActionUpdateClientStateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionUpdateClientStateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['calls/%1$s/actions/client_state_update', $callControlID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateClientStateResponse::class,
        );

        return $response->parse();
    }
}
