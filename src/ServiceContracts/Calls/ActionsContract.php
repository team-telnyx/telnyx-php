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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionAnswerParams $params
     *
     * @throws APIException
     */
    public function answer(
        string $callControlID,
        array|ActionAnswerParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionAnswerResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionBridgeParams $params
     *
     * @throws APIException
     */
    public function bridge(
        string $callControlIDToBridge,
        array|ActionBridgeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionBridgeResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionEnqueueParams $params
     *
     * @throws APIException
     */
    public function enqueue(
        string $callControlID,
        array|ActionEnqueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnqueueResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionGatherParams $params
     *
     * @throws APIException
     */
    public function gather(
        string $callControlID,
        array|ActionGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionGatherUsingAIParams $params
     *
     * @throws APIException
     */
    public function gatherUsingAI(
        string $callControlID,
        array|ActionGatherUsingAIParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAIResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionGatherUsingAudioParams $params
     *
     * @throws APIException
     */
    public function gatherUsingAudio(
        string $callControlID,
        array|ActionGatherUsingAudioParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingAudioResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionGatherUsingSpeakParams $params
     *
     * @throws APIException
     */
    public function gatherUsingSpeak(
        string $callControlID,
        array|ActionGatherUsingSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGatherUsingSpeakResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionHangupParams $params
     *
     * @throws APIException
     */
    public function hangup(
        string $callControlID,
        array|ActionHangupParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionHangupResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionLeaveQueueParams $params
     *
     * @throws APIException
     */
    public function leaveQueue(
        string $callControlID,
        array|ActionLeaveQueueParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionLeaveQueueResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionPauseRecordingParams $params
     *
     * @throws APIException
     */
    public function pauseRecording(
        string $callControlID,
        array|ActionPauseRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionPauseRecordingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionReferParams $params
     *
     * @throws APIException
     */
    public function refer(
        string $callControlID,
        array|ActionReferParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionReferResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRejectParams $params
     *
     * @throws APIException
     */
    public function reject(
        string $callControlID,
        array|ActionRejectParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRejectResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionResumeRecordingParams $params
     *
     * @throws APIException
     */
    public function resumeRecording(
        string $callControlID,
        array|ActionResumeRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResumeRecordingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSendDtmfParams $params
     *
     * @throws APIException
     */
    public function sendDtmf(
        string $callControlID,
        array|ActionSendDtmfParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendDtmfResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSendSipInfoParams $params
     *
     * @throws APIException
     */
    public function sendSipInfo(
        string $callControlID,
        array|ActionSendSipInfoParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSendSipInfoResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSpeakParams $params
     *
     * @throws APIException
     */
    public function speak(
        string $callControlID,
        array|ActionSpeakParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSpeakResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartAIAssistantParams $params
     *
     * @throws APIException
     */
    public function startAIAssistant(
        string $callControlID,
        array|ActionStartAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartAIAssistantResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartForkingParams $params
     *
     * @throws APIException
     */
    public function startForking(
        string $callControlID,
        array|ActionStartForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartForkingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartNoiseSuppressionParams $params
     *
     * @throws APIException
     */
    public function startNoiseSuppression(
        string $callControlID,
        array|ActionStartNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartPlaybackParams $params
     *
     * @throws APIException
     */
    public function startPlayback(
        string $callControlID,
        array|ActionStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartPlaybackResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartRecordingParams $params
     *
     * @throws APIException
     */
    public function startRecording(
        string $callControlID,
        array|ActionStartRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartRecordingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartSiprecParams $params
     *
     * @throws APIException
     */
    public function startSiprec(
        string $callControlID,
        array|ActionStartSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartSiprecResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartStreamingParams $params
     *
     * @throws APIException
     */
    public function startStreaming(
        string $callControlID,
        array|ActionStartStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartStreamingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStartTranscriptionParams $params
     *
     * @throws APIException
     */
    public function startTranscription(
        string $callControlID,
        array|ActionStartTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStartTranscriptionResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopAIAssistantParams $params
     *
     * @throws APIException
     */
    public function stopAIAssistant(
        string $callControlID,
        array|ActionStopAIAssistantParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopAIAssistantResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopForkingParams $params
     *
     * @throws APIException
     */
    public function stopForking(
        string $callControlID,
        array|ActionStopForkingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopForkingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopGatherParams $params
     *
     * @throws APIException
     */
    public function stopGather(
        string $callControlID,
        array|ActionStopGatherParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopGatherResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopNoiseSuppressionParams $params
     *
     * @throws APIException
     */
    public function stopNoiseSuppression(
        string $callControlID,
        array|ActionStopNoiseSuppressionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopNoiseSuppressionResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopPlaybackParams $params
     *
     * @throws APIException
     */
    public function stopPlayback(
        string $callControlID,
        array|ActionStopPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopPlaybackResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopRecordingParams $params
     *
     * @throws APIException
     */
    public function stopRecording(
        string $callControlID,
        array|ActionStopRecordingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopRecordingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopSiprecParams $params
     *
     * @throws APIException
     */
    public function stopSiprec(
        string $callControlID,
        array|ActionStopSiprecParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopSiprecResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopStreamingParams $params
     *
     * @throws APIException
     */
    public function stopStreaming(
        string $callControlID,
        array|ActionStopStreamingParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopStreamingResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionStopTranscriptionParams $params
     *
     * @throws APIException
     */
    public function stopTranscription(
        string $callControlID,
        array|ActionStopTranscriptionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionStopTranscriptionResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSwitchSupervisorRoleParams $params
     *
     * @throws APIException
     */
    public function switchSupervisorRole(
        string $callControlID,
        array|ActionSwitchSupervisorRoleParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSwitchSupervisorRoleResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionTransferParams $params
     *
     * @throws APIException
     */
    public function transfer(
        string $callControlID,
        array|ActionTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionTransferResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionUpdateClientStateParams $params
     *
     * @throws APIException
     */
    public function updateClientState(
        string $callControlID,
        array|ActionUpdateClientStateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateClientStateResponse;
}
