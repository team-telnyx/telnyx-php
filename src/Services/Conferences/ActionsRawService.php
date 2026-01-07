<?php

declare(strict_types=1);

namespace Telnyx\Services\Conferences;

use Telnyx\Client;
use Telnyx\Conferences\Actions\ActionHoldParams;
use Telnyx\Conferences\Actions\ActionHoldResponse;
use Telnyx\Conferences\Actions\ActionJoinParams;
use Telnyx\Conferences\Actions\ActionJoinParams\BeepEnabled;
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
use Telnyx\Conferences\Actions\ActionRecordStartParams\Format;
use Telnyx\Conferences\Actions\ActionRecordStartParams\Trim;
use Telnyx\Conferences\Actions\ActionRecordStartResponse;
use Telnyx\Conferences\Actions\ActionRecordStopParams;
use Telnyx\Conferences\Actions\ActionRecordStopResponse;
use Telnyx\Conferences\Actions\ActionSpeakParams;
use Telnyx\Conferences\Actions\ActionSpeakParams\Language;
use Telnyx\Conferences\Actions\ActionSpeakParams\PayloadType;
use Telnyx\Conferences\Actions\ActionSpeakResponse;
use Telnyx\Conferences\Actions\ActionStopParams;
use Telnyx\Conferences\Actions\ActionStopResponse;
use Telnyx\Conferences\Actions\ActionUnholdParams;
use Telnyx\Conferences\Actions\ActionUnholdResponse;
use Telnyx\Conferences\Actions\ActionUnmuteParams;
use Telnyx\Conferences\Actions\ActionUnmuteResponse;
use Telnyx\Conferences\Actions\ActionUpdateParams;
use Telnyx\Conferences\Actions\ActionUpdateParams\Region;
use Telnyx\Conferences\Actions\ActionUpdateParams\SupervisorRole;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Conferences\ActionsRawContract;

/**
 * @phpstan-import-type LoopcountShape from \Telnyx\Calls\Actions\Loopcount
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Update conference participant supervisor_role
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlID: string,
     *   supervisorRole: SupervisorRole|value-of<SupervisorRole>,
     *   commandID?: string,
     *   region?: Region|value-of<Region>,
     *   whisperCallControlIDs?: list<string>,
     * }|ActionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/update', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Hold a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   audioURL?: string,
     *   callControlIDs?: list<string>,
     *   mediaName?: string,
     *   region?: ActionHoldParams\Region|value-of<ActionHoldParams\Region>,
     * }|ActionHoldParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionHoldResponse>
     *
     * @throws APIException
     */
    public function hold(
        string $id,
        array|ActionHoldParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionHoldParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/hold', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionHoldResponse::class,
        );
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
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlID: string,
     *   beepEnabled?: BeepEnabled|value-of<BeepEnabled>,
     *   clientState?: string,
     *   commandID?: string,
     *   endConferenceOnExit?: bool,
     *   hold?: bool,
     *   holdAudioURL?: string,
     *   holdMediaName?: string,
     *   mute?: bool,
     *   region?: ActionJoinParams\Region|value-of<ActionJoinParams\Region>,
     *   softEndConferenceOnExit?: bool,
     *   startConferenceOnEnter?: bool,
     *   supervisorRole?: ActionJoinParams\SupervisorRole|value-of<ActionJoinParams\SupervisorRole>,
     *   whisperCallControlIDs?: list<string>,
     * }|ActionJoinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionJoinResponse>
     *
     * @throws APIException
     */
    public function join(
        string $id,
        array|ActionJoinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionJoinParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/join', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionJoinResponse::class,
        );
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
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlID: string,
     *   beepEnabled?: ActionLeaveParams\BeepEnabled|value-of<ActionLeaveParams\BeepEnabled>,
     *   commandID?: string,
     *   region?: ActionLeaveParams\Region|value-of<ActionLeaveParams\Region>,
     * }|ActionLeaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionLeaveResponse>
     *
     * @throws APIException
     */
    public function leave(
        string $id,
        array|ActionLeaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionLeaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/leave', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionLeaveResponse::class,
        );
    }

    /**
     * @api
     *
     * Mute a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlIDs?: list<string>,
     *   region?: ActionMuteParams\Region|value-of<ActionMuteParams\Region>,
     * }|ActionMuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionMuteResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $id,
        array|ActionMuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/mute', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionMuteResponse::class,
        );
    }

    /**
     * @api
     *
     * Play audio to all or some participants on a conference call.
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   audioURL?: string,
     *   callControlIDs?: list<string>,
     *   loop?: LoopcountShape,
     *   mediaName?: string,
     *   region?: ActionPlayParams\Region|value-of<ActionPlayParams\Region>,
     * }|ActionPlayParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionPlayResponse>
     *
     * @throws APIException
     */
    public function play(
        string $id,
        array|ActionPlayParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionPlayParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/play', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionPlayResponse::class,
        );
    }

    /**
     * @api
     *
     * Pause conference recording.
     *
     * @param string $id Specifies the conference by id or name
     * @param array{
     *   commandID?: string,
     *   recordingID?: string,
     *   region?: ActionRecordPauseParams\Region|value-of<ActionRecordPauseParams\Region>,
     * }|ActionRecordPauseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRecordPauseResponse>
     *
     * @throws APIException
     */
    public function recordPause(
        string $id,
        array|ActionRecordPauseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRecordPauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_pause', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordPauseResponse::class,
        );
    }

    /**
     * @api
     *
     * Resume conference recording.
     *
     * @param string $id Specifies the conference by id or name
     * @param array{
     *   commandID?: string,
     *   recordingID?: string,
     *   region?: ActionRecordResumeParams\Region|value-of<ActionRecordResumeParams\Region>,
     * }|ActionRecordResumeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRecordResumeResponse>
     *
     * @throws APIException
     */
    public function recordResume(
        string $id,
        array|ActionRecordResumeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRecordResumeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_resume', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordResumeResponse::class,
        );
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
     * @param string $id Specifies the conference to record by id or name
     * @param array{
     *   format: Format|value-of<Format>,
     *   commandID?: string,
     *   customFileName?: string,
     *   playBeep?: bool,
     *   region?: ActionRecordStartParams\Region|value-of<ActionRecordStartParams\Region>,
     *   trim?: Trim|value-of<Trim>,
     * }|ActionRecordStartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRecordStartResponse>
     *
     * @throws APIException
     */
    public function recordStart(
        string $id,
        array|ActionRecordStartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRecordStartParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_start', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordStartResponse::class,
        );
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
     * @param string $id Specifies the conference to stop the recording for by id or name
     * @param array{
     *   clientState?: string,
     *   commandID?: string,
     *   recordingID?: string,
     *   region?: ActionRecordStopParams\Region|value-of<ActionRecordStopParams\Region>,
     * }|ActionRecordStopParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRecordStopResponse>
     *
     * @throws APIException
     */
    public function recordStop(
        string $id,
        array|ActionRecordStopParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRecordStopParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/record_stop', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionRecordStopResponse::class,
        );
    }

    /**
     * @api
     *
     * Convert text to speech and play it to all or some participants.
     *
     * @param string $id Specifies the conference by id or name
     * @param array{
     *   payload: string,
     *   voice: string,
     *   callControlIDs?: list<string>,
     *   commandID?: string,
     *   language?: value-of<Language>,
     *   payloadType?: PayloadType|value-of<PayloadType>,
     *   region?: ActionSpeakParams\Region|value-of<ActionSpeakParams\Region>,
     *   voiceSettings?: VoiceSettingsShape,
     * }|ActionSpeakParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSpeakResponse>
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        array|ActionSpeakParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/speak', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionSpeakResponse::class,
        );
    }

    /**
     * @api
     *
     * Stop audio being played to all or some participants on a conference call.
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlIDs?: list<string>,
     *   region?: ActionStopParams\Region|value-of<ActionStopParams\Region>,
     * }|ActionStopParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopResponse>
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        array|ActionStopParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionStopParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/stop', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionStopResponse::class,
        );
    }

    /**
     * @api
     *
     * Unhold a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlIDs: list<string>,
     *   region?: ActionUnholdParams\Region|value-of<ActionUnholdParams\Region>,
     * }|ActionUnholdParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUnholdResponse>
     *
     * @throws APIException
     */
    public function unhold(
        string $id,
        array|ActionUnholdParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUnholdParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/unhold', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnholdResponse::class,
        );
    }

    /**
     * @api
     *
     * Unmute a list of participants in a conference call
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array{
     *   callControlIDs?: list<string>,
     *   region?: ActionUnmuteParams\Region|value-of<ActionUnmuteParams\Region>,
     * }|ActionUnmuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUnmuteResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $id,
        array|ActionUnmuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conferences/%1$s/actions/unmute', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnmuteResponse::class,
        );
    }
}
