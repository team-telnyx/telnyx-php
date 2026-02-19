<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Conferences;

use Telnyx\Conferences\Actions\ActionEndParams;
use Telnyx\Conferences\Actions\ActionEndResponse;
use Telnyx\Conferences\Actions\ActionGatherUsingAudioParams;
use Telnyx\Conferences\Actions\ActionGatherUsingAudioResponse;
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
use Telnyx\Conferences\Actions\ActionSendDtmfParams;
use Telnyx\Conferences\Actions\ActionSendDtmfResponse;
use Telnyx\Conferences\Actions\ActionSpeakParams;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param array<string,mixed>|ActionEndParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEndResponse>
     *
     * @throws APIException
     */
    public function end(
        string $id,
        array|ActionEndParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param array<string,mixed>|ActionGatherUsingAudioParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGatherUsingAudioResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $id,
        array|ActionGatherUsingAudioParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionHoldParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionJoinParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionLeaveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionMuteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionPlayParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param array<string,mixed>|ActionRecordPauseParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param array<string,mixed>|ActionRecordResumeParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference to record by id or name
     * @param array<string,mixed>|ActionRecordStartParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference to stop the recording for by id or name
     * @param array<string,mixed>|ActionRecordStopParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id uniquely identifies the conference
     * @param array<string,mixed>|ActionSendDtmfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSendDtmfResponse>
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $id,
        array|ActionSendDtmfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Specifies the conference by id or name
     * @param array<string,mixed>|ActionSpeakParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionStopParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionUnholdParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id or name
     * @param array<string,mixed>|ActionUnmuteParams $params
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
    ): BaseResponse;
}
