<?php

declare(strict_types=1);

namespace Telnyx\Services\Conferences;

use Telnyx\Client;
use Telnyx\Conferences\Actions\ActionHoldParams;
use Telnyx\Conferences\Actions\ActionHoldResponse;
use Telnyx\Conferences\Actions\ActionJoinParams;
use Telnyx\Conferences\Actions\ActionJoinResponse;
use Telnyx\Conferences\Actions\ActionLeaveParams;
use Telnyx\Conferences\Actions\ActionLeaveResponse;
use Telnyx\Conferences\Actions\ActionMuteParams;
use Telnyx\Conferences\Actions\ActionMuteResponse;
use Telnyx\Conferences\Actions\ActionPlayParams;
use Telnyx\Conferences\Actions\ActionPlayResponse;
use Telnyx\Conferences\Actions\ActionRecordPauseParams;
use Telnyx\Conferences\Actions\ActionRecordPauseResponse;
use Telnyx\Conferences\Actions\ActionRecordResumeParams;
use Telnyx\Conferences\Actions\ActionRecordResumeResponse;
use Telnyx\Conferences\Actions\ActionRecordStartParams;
use Telnyx\Conferences\Actions\ActionRecordStartResponse;
use Telnyx\Conferences\Actions\ActionRecordStopParams;
use Telnyx\Conferences\Actions\ActionRecordStopResponse;
use Telnyx\Conferences\Actions\ActionSpeakParams;
use Telnyx\Conferences\Actions\ActionSpeakParams\Language;
use Telnyx\Conferences\Actions\ActionSpeakResponse;
use Telnyx\Conferences\Actions\ActionStopParams;
use Telnyx\Conferences\Actions\ActionStopResponse;
use Telnyx\Conferences\Actions\ActionUnholdParams;
use Telnyx\Conferences\Actions\ActionUnholdResponse;
use Telnyx\Conferences\Actions\ActionUnmuteParams;
use Telnyx\Conferences\Actions\ActionUnmuteResponse;
use Telnyx\Conferences\Actions\ActionUpdateParams;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Conferences\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update conference participant supervisor_role
     *
     * @param array{
     *   call_control_id: string,
     *   supervisor_role: 'barge'|'monitor'|'none'|'whisper',
     *   command_id?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     *   whisper_call_control_ids?: list<string>,
     * }|ActionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse {
        [$parsed, $options] = ActionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionUpdateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/update', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Hold a list of participants in a conference call
     *
     * @param array{
     *   audio_url?: string,
     *   call_control_ids?: list<string>,
     *   media_name?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionHoldParams $params
     *
     * @throws APIException
     */
    public function hold(
        string $id,
        array|ActionHoldParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionHoldResponse {
        [$parsed, $options] = ActionHoldParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionHoldResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/hold', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionHoldResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Join an existing call leg to a conference. Issue the Join Conference command with the conference ID in the path and the `call_control_id` of the leg you wish to join to the conference as an attribute. The conference can have up to a certain amount of active participants, as set by the `max_participants` parameter in conference creation request.
     *
     * **Expected Webhooks:**
     *
     * - `conference.participant.joined`
     * - `conference.participant.left`
     *
     * @param array{
     *   call_control_id: string,
     *   beep_enabled?: 'always'|'never'|'on_enter'|'on_exit',
     *   client_state?: string,
     *   command_id?: string,
     *   end_conference_on_exit?: bool,
     *   hold?: bool,
     *   hold_audio_url?: string,
     *   hold_media_name?: string,
     *   mute?: bool,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     *   soft_end_conference_on_exit?: bool,
     *   start_conference_on_enter?: bool,
     *   supervisor_role?: 'barge'|'monitor'|'none'|'whisper',
     *   whisper_call_control_ids?: list<string>,
     * }|ActionJoinParams $params
     *
     * @throws APIException
     */
    public function join(
        string $id,
        array|ActionJoinParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionJoinResponse {
        [$parsed, $options] = ActionJoinParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionJoinResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/join', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionJoinResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a call leg from a conference and moves it back to parked state.
     *
     * **Expected Webhooks:**
     *
     * - `conference.participant.left`
     *
     * @param array{
     *   call_control_id: string,
     *   beep_enabled?: 'always'|'never'|'on_enter'|'on_exit',
     *   command_id?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionLeaveParams $params
     *
     * @throws APIException
     */
    public function leave(
        string $id,
        array|ActionLeaveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveResponse {
        [$parsed, $options] = ActionLeaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionLeaveResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/leave', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionLeaveResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Mute a list of participants in a conference call
     *
     * @param array{
     *   call_control_ids?: list<string>,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionMuteParams $params
     *
     * @throws APIException
     */
    public function mute(
        string $id,
        array|ActionMuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionMuteResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/mute', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionMuteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Play audio to all or some participants on a conference call.
     *
     * @param array{
     *   audio_url?: string,
     *   call_control_ids?: list<string>,
     *   loop?: string|int,
     *   media_name?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionPlayParams $params
     *
     * @throws APIException
     */
    public function play(
        string $id,
        array|ActionPlayParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionPlayResponse {
        [$parsed, $options] = ActionPlayParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionPlayResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/play', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionPlayResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause conference recording.
     *
     * @param array{
     *   command_id?: string,
     *   recording_id?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionRecordPauseParams $params
     *
     * @throws APIException
     */
    public function recordPause(
        string $id,
        array|ActionRecordPauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordPauseResponse {
        [$parsed, $options] = ActionRecordPauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionRecordPauseResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_pause', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordPauseResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume conference recording.
     *
     * @param array{
     *   command_id?: string,
     *   recording_id?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionRecordResumeParams $params
     *
     * @throws APIException
     */
    public function recordResume(
        string $id,
        array|ActionRecordResumeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordResumeResponse {
        [$parsed, $options] = ActionRecordResumeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionRecordResumeResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_resume', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordResumeResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Start recording the conference. Recording will stop on conference end, or via the Stop Recording command.
     *
     * **Expected Webhooks:**
     *
     * - `conference.recording.saved`
     *
     * @param array{
     *   format: 'wav'|'mp3',
     *   command_id?: string,
     *   custom_file_name?: string,
     *   play_beep?: bool,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     *   trim?: 'trim-silence',
     * }|ActionRecordStartParams $params
     *
     * @throws APIException
     */
    public function recordStart(
        string $id,
        array|ActionRecordStartParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStartResponse {
        [$parsed, $options] = ActionRecordStartParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionRecordStartResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_start', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordStartResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop recording the conference.
     *
     * **Expected Webhooks:**
     *
     * - `conference.recording.saved`
     *
     * @param array{
     *   client_state?: string,
     *   command_id?: string,
     *   recording_id?: string,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionRecordStopParams $params
     *
     * @throws APIException
     */
    public function recordStop(
        string $id,
        array|ActionRecordStopParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStopResponse {
        [$parsed, $options] = ActionRecordStopParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionRecordStopResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_stop', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordStopResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Convert text to speech and play it to all or some participants.
     *
     * @param array{
     *   payload: string,
     *   voice: string,
     *   call_control_ids?: list<string>,
     *   command_id?: string,
     *   language?: value-of<Language>,
     *   payload_type?: 'text'|'ssml',
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     *   voice_settings?: array<string,mixed>,
     * }|ActionSpeakParams $params
     *
     * @throws APIException
     */
    public function speak(
        string $id,
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
            path: ['conferences/%1$s/actions/speak', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionSpeakResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop audio being played to all or some participants on a conference call.
     *
     * @param array{
     *   call_control_ids?: list<string>,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionStopParams $params
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        array|ActionStopParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopResponse {
        [$parsed, $options] = ActionStopParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionStopResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/stop', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Unhold a list of participants in a conference call
     *
     * @param array{
     *   call_control_ids: list<string>,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionUnholdParams $params
     *
     * @throws APIException
     */
    public function unhold(
        string $id,
        array|ActionUnholdParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnholdResponse {
        [$parsed, $options] = ActionUnholdParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionUnholdResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/unhold', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnholdResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Unmute a list of participants in a conference call
     *
     * @param array{
     *   call_control_ids?: list<string>,
     *   region?: 'Australia'|'Europe'|'Middle East'|'US',
     * }|ActionUnmuteParams $params
     *
     * @throws APIException
     */
    public function unmute(
        string $id,
        array|ActionUnmuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionUnmuteResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/unmute', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnmuteResponse::class,
        );

        return $response->parse();
    }
}
