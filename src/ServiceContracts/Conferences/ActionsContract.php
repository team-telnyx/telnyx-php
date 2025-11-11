<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Conferences;

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
use Telnyx\Conferences\Actions\ActionSpeakResponse;
use Telnyx\Conferences\Actions\ActionStopParams;
use Telnyx\Conferences\Actions\ActionStopResponse;
use Telnyx\Conferences\Actions\ActionUnholdParams;
use Telnyx\Conferences\Actions\ActionUnholdResponse;
use Telnyx\Conferences\Actions\ActionUnmuteParams;
use Telnyx\Conferences\Actions\ActionUnmuteResponse;
use Telnyx\Conferences\Actions\ActionUpdateParams;
use Telnyx\Conferences\Actions\ActionUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionHoldParams $params
     *
     * @throws APIException
     */
    public function hold(
        string $id,
        array|ActionHoldParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionHoldResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionJoinParams $params
     *
     * @throws APIException
     */
    public function join(
        string $id,
        array|ActionJoinParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionJoinResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionLeaveParams $params
     *
     * @throws APIException
     */
    public function leave(
        string $id,
        array|ActionLeaveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionMuteParams $params
     *
     * @throws APIException
     */
    public function mute(
        string $id,
        array|ActionMuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionPlayParams $params
     *
     * @throws APIException
     */
    public function play(
        string $id,
        array|ActionPlayParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionPlayResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRecordPauseParams $params
     *
     * @throws APIException
     */
    public function recordPause(
        string $id,
        array|ActionRecordPauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordPauseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRecordResumeParams $params
     *
     * @throws APIException
     */
    public function recordResume(
        string $id,
        array|ActionRecordResumeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordResumeResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRecordStartParams $params
     *
     * @throws APIException
     */
    public function recordStart(
        string $id,
        array|ActionRecordStartParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStartResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRecordStopParams $params
     *
     * @throws APIException
     */
    public function recordStop(
        string $id,
        array|ActionRecordStopParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRecordStopResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSpeakParams $params
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        array|ActionSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopParams $params
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        array|ActionStopParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionUnholdParams $params
     *
     * @throws APIException
     */
    public function unhold(
        string $id,
        array|ActionUnholdParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnholdResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionUnmuteParams $params
     *
     * @throws APIException
     */
    public function unmute(
        string $id,
        array|ActionUnmuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;
}
