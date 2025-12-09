<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Calls;

use Telnyx\Calls\Actions\ActionAnswerParams;
use Telnyx\Calls\Actions\ActionAnswerResponse;
use Telnyx\Calls\Actions\ActionBridgeParams;
use Telnyx\Calls\Actions\ActionBridgeResponse;
use Telnyx\Calls\Actions\ActionEnqueueParams;
use Telnyx\Calls\Actions\ActionEnqueueResponse;
use Telnyx\Calls\Actions\ActionGatherParams;
use Telnyx\Calls\Actions\ActionGatherResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams;
use Telnyx\Calls\Actions\ActionGatherUsingAIResponse;
use Telnyx\Calls\Actions\ActionGatherUsingAudioParams;
use Telnyx\Calls\Actions\ActionGatherUsingAudioResponse;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams;
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
use Telnyx\Calls\Actions\ActionStartForkingResponse;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionResponse;
use Telnyx\Calls\Actions\ActionStartPlaybackParams;
use Telnyx\Calls\Actions\ActionStartPlaybackResponse;
use Telnyx\Calls\Actions\ActionStartRecordingParams;
use Telnyx\Calls\Actions\ActionStartRecordingResponse;
use Telnyx\Calls\Actions\ActionStartSiprecParams;
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
use Telnyx\Calls\Actions\ActionTransferResponse;
use Telnyx\Calls\Actions\ActionUpdateClientStateParams;
use Telnyx\Calls\Actions\ActionUpdateClientStateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionAnswerParams $params
     *
     * @return BaseResponse<ActionAnswerResponse>
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        array|ActionAnswerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID_ Unique identifier and token for controlling the call
     * @param array<mixed>|ActionBridgeParams $params
     *
     * @return BaseResponse<ActionBridgeResponse>
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlID_,
        array|ActionBridgeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionEnqueueParams $params
     *
     * @return BaseResponse<ActionEnqueueResponse>
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        array|ActionEnqueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionGatherParams $params
     *
     * @return BaseResponse<ActionGatherResponse>
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        array|ActionGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionGatherUsingAIParams $params
     *
     * @return BaseResponse<ActionGatherUsingAIResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array|ActionGatherUsingAIParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionGatherUsingAudioParams $params
     *
     * @return BaseResponse<ActionGatherUsingAudioResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        array|ActionGatherUsingAudioParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionGatherUsingSpeakParams $params
     *
     * @return BaseResponse<ActionGatherUsingSpeakResponse>
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        array|ActionGatherUsingSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionHangupParams $params
     *
     * @return BaseResponse<ActionHangupResponse>
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        array|ActionHangupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionLeaveQueueParams $params
     *
     * @return BaseResponse<ActionLeaveQueueResponse>
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        array|ActionLeaveQueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionPauseRecordingParams $params
     *
     * @return BaseResponse<ActionPauseRecordingResponse>
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        array|ActionPauseRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionReferParams $params
     *
     * @return BaseResponse<ActionReferResponse>
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        array|ActionReferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionRejectParams $params
     *
     * @return BaseResponse<ActionRejectResponse>
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        array|ActionRejectParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionResumeRecordingParams $params
     *
     * @return BaseResponse<ActionResumeRecordingResponse>
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        array|ActionResumeRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionSendDtmfParams $params
     *
     * @return BaseResponse<ActionSendDtmfResponse>
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        array|ActionSendDtmfParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionSendSipInfoParams $params
     *
     * @return BaseResponse<ActionSendSipInfoResponse>
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        array|ActionSendSipInfoParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionSpeakParams $params
     *
     * @return BaseResponse<ActionSpeakResponse>
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        array|ActionSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartAIAssistantParams $params
     *
     * @return BaseResponse<ActionStartAIAssistantResponse>
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        array|ActionStartAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartForkingParams $params
     *
     * @return BaseResponse<ActionStartForkingResponse>
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        array|ActionStartForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartNoiseSuppressionParams $params
     *
     * @return BaseResponse<ActionStartNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        array|ActionStartNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartPlaybackParams $params
     *
     * @return BaseResponse<ActionStartPlaybackResponse>
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        array|ActionStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartRecordingParams $params
     *
     * @return BaseResponse<ActionStartRecordingResponse>
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        array|ActionStartRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartSiprecParams $params
     *
     * @return BaseResponse<ActionStartSiprecResponse>
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        array|ActionStartSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartStreamingParams $params
     *
     * @return BaseResponse<ActionStartStreamingResponse>
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        array|ActionStartStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStartTranscriptionParams $params
     *
     * @return BaseResponse<ActionStartTranscriptionResponse>
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        array|ActionStartTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopAIAssistantParams $params
     *
     * @return BaseResponse<ActionStopAIAssistantResponse>
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        array|ActionStopAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopForkingParams $params
     *
     * @return BaseResponse<ActionStopForkingResponse>
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        array|ActionStopForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopGatherParams $params
     *
     * @return BaseResponse<ActionStopGatherResponse>
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        array|ActionStopGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopNoiseSuppressionParams $params
     *
     * @return BaseResponse<ActionStopNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        array|ActionStopNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopPlaybackParams $params
     *
     * @return BaseResponse<ActionStopPlaybackResponse>
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        array|ActionStopPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopRecordingParams $params
     *
     * @return BaseResponse<ActionStopRecordingResponse>
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        array|ActionStopRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopSiprecParams $params
     *
     * @return BaseResponse<ActionStopSiprecResponse>
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        array|ActionStopSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopStreamingParams $params
     *
     * @return BaseResponse<ActionStopStreamingResponse>
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        array|ActionStopStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionStopTranscriptionParams $params
     *
     * @return BaseResponse<ActionStopTranscriptionResponse>
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        array|ActionStopTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionSwitchSupervisorRoleParams $params
     *
     * @return BaseResponse<ActionSwitchSupervisorRoleResponse>
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        array|ActionSwitchSupervisorRoleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionTransferParams $params
     *
     * @return BaseResponse<ActionTransferResponse>
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        array|ActionTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|ActionUpdateClientStateParams $params
     *
     * @return BaseResponse<ActionUpdateClientStateResponse>
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        array|ActionUpdateClientStateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
