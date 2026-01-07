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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionAnswerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionAnswerResponse>
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        array|ActionAnswerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlIDToBridge Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionBridgeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionBridgeResponse>
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlIDToBridge,
        array|ActionBridgeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionEnqueueParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEnqueueResponse>
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        array|ActionEnqueueParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionGatherParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGatherResponse>
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        array|ActionGatherParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionGatherUsingAIParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGatherUsingAIResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array|ActionGatherUsingAIParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionGatherUsingAudioParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGatherUsingAudioResponse>
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        array|ActionGatherUsingAudioParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionGatherUsingSpeakParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGatherUsingSpeakResponse>
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        array|ActionGatherUsingSpeakParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionHangupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionHangupResponse>
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        array|ActionHangupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionLeaveQueueParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionLeaveQueueResponse>
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        array|ActionLeaveQueueParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionPauseRecordingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionPauseRecordingResponse>
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        array|ActionPauseRecordingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionReferParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionReferResponse>
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        array|ActionReferParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionRejectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRejectResponse>
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        array|ActionRejectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionResumeRecordingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResumeRecordingResponse>
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        array|ActionResumeRecordingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionSendDtmfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSendDtmfResponse>
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        array|ActionSendDtmfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionSendSipInfoParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSendSipInfoResponse>
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        array|ActionSendSipInfoParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionSpeakParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSpeakResponse>
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        array|ActionSpeakParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartAIAssistantParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartAIAssistantResponse>
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        array|ActionStartAIAssistantParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartForkingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartForkingResponse>
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        array|ActionStartForkingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartNoiseSuppressionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        array|ActionStartNoiseSuppressionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartPlaybackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartPlaybackResponse>
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        array|ActionStartPlaybackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartRecordingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartRecordingResponse>
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        array|ActionStartRecordingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartSiprecParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartSiprecResponse>
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        array|ActionStartSiprecParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartStreamingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartStreamingResponse>
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        array|ActionStartStreamingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStartTranscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStartTranscriptionResponse>
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        array|ActionStartTranscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopAIAssistantParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopAIAssistantResponse>
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        array|ActionStopAIAssistantParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopForkingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopForkingResponse>
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        array|ActionStopForkingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopGatherParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopGatherResponse>
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        array|ActionStopGatherParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopNoiseSuppressionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopNoiseSuppressionResponse>
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        array|ActionStopNoiseSuppressionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopPlaybackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopPlaybackResponse>
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        array|ActionStopPlaybackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopRecordingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopRecordingResponse>
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        array|ActionStopRecordingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopSiprecParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopSiprecResponse>
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        array|ActionStopSiprecParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopStreamingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopStreamingResponse>
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        array|ActionStopStreamingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionStopTranscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopTranscriptionResponse>
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        array|ActionStopTranscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionSwitchSupervisorRoleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSwitchSupervisorRoleResponse>
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        array|ActionSwitchSupervisorRoleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionTransferParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionTransferResponse>
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        array|ActionTransferParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<string,mixed>|ActionUpdateClientStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUpdateClientStateResponse>
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        array|ActionUpdateClientStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
