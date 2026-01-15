<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type CallAIGatherEndedWebhookEventShape from \Telnyx\Webhooks\CallAIGatherEndedWebhookEvent
 * @phpstan-import-type CallAIGatherMessageHistoryUpdatedWebhookEventShape from \Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent
 * @phpstan-import-type CallAIGatherPartialResultsWebhookEventShape from \Telnyx\Webhooks\CallAIGatherPartialResultsWebhookEvent
 * @phpstan-import-type CallAnsweredWebhookEventShape from \Telnyx\Webhooks\CallAnsweredWebhookEvent
 * @phpstan-import-type CallBridgedWebhookEventShape from \Telnyx\Webhooks\CallBridgedWebhookEvent
 * @phpstan-import-type CallConversationEndedWebhookEventShape from \Telnyx\Webhooks\CallConversationEndedWebhookEvent
 * @phpstan-import-type CallConversationInsightsGeneratedWebhookEventShape from \Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent
 * @phpstan-import-type CallDtmfReceivedWebhookEventShape from \Telnyx\Webhooks\CallDtmfReceivedWebhookEvent
 * @phpstan-import-type CallEnqueuedWebhookEventShape from \Telnyx\Webhooks\CallEnqueuedWebhookEvent
 * @phpstan-import-type CallForkStartedWebhookEventShape from \Telnyx\Webhooks\CallForkStartedWebhookEvent
 * @phpstan-import-type CallForkStoppedWebhookEventShape from \Telnyx\Webhooks\CallForkStoppedWebhookEvent
 * @phpstan-import-type CallGatherEndedWebhookEventShape from \Telnyx\Webhooks\CallGatherEndedWebhookEvent
 * @phpstan-import-type CallHangupWebhookEventShape from \Telnyx\Webhooks\CallHangupWebhookEvent
 * @phpstan-import-type CallInitiatedWebhookEventShape from \Telnyx\Webhooks\CallInitiatedWebhookEvent
 * @phpstan-import-type CallLeftQueueWebhookEventShape from \Telnyx\Webhooks\CallLeftQueueWebhookEvent
 * @phpstan-import-type CallMachineDetectionEndedWebhookEventShape from \Telnyx\Webhooks\CallMachineDetectionEndedWebhookEvent
 * @phpstan-import-type CallMachineGreetingEndedWebhookEventShape from \Telnyx\Webhooks\CallMachineGreetingEndedWebhookEvent
 * @phpstan-import-type CallMachinePremiumDetectionEndedWebhookEventShape from \Telnyx\Webhooks\CallMachinePremiumDetectionEndedWebhookEvent
 * @phpstan-import-type CallMachinePremiumGreetingEndedWebhookEventShape from \Telnyx\Webhooks\CallMachinePremiumGreetingEndedWebhookEvent
 * @phpstan-import-type CallPlaybackEndedWebhookEventShape from \Telnyx\Webhooks\CallPlaybackEndedWebhookEvent
 * @phpstan-import-type CallPlaybackStartedWebhookEventShape from \Telnyx\Webhooks\CallPlaybackStartedWebhookEvent
 * @phpstan-import-type CallRecordingErrorWebhookEventShape from \Telnyx\Webhooks\CallRecordingErrorWebhookEvent
 * @phpstan-import-type CallRecordingSavedWebhookEventShape from \Telnyx\Webhooks\CallRecordingSavedWebhookEvent
 * @phpstan-import-type CallRecordingTranscriptionSavedWebhookEventShape from \Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent
 * @phpstan-import-type CallReferCompletedWebhookEventShape from \Telnyx\Webhooks\CallReferCompletedWebhookEvent
 * @phpstan-import-type CallReferFailedWebhookEventShape from \Telnyx\Webhooks\CallReferFailedWebhookEvent
 * @phpstan-import-type CallReferStartedWebhookEventShape from \Telnyx\Webhooks\CallReferStartedWebhookEvent
 * @phpstan-import-type CallSiprecFailedWebhookEventShape from \Telnyx\Webhooks\CallSiprecFailedWebhookEvent
 * @phpstan-import-type CallSiprecStartedWebhookEventShape from \Telnyx\Webhooks\CallSiprecStartedWebhookEvent
 * @phpstan-import-type CallSiprecStoppedWebhookEventShape from \Telnyx\Webhooks\CallSiprecStoppedWebhookEvent
 * @phpstan-import-type CallSpeakEndedWebhookEventShape from \Telnyx\Webhooks\CallSpeakEndedWebhookEvent
 * @phpstan-import-type CallSpeakStartedWebhookEventShape from \Telnyx\Webhooks\CallSpeakStartedWebhookEvent
 * @phpstan-import-type CallStreamingFailedWebhookEventShape from \Telnyx\Webhooks\CallStreamingFailedWebhookEvent
 * @phpstan-import-type CallStreamingStartedWebhookEventShape from \Telnyx\Webhooks\CallStreamingStartedWebhookEvent
 * @phpstan-import-type CallStreamingStoppedWebhookEventShape from \Telnyx\Webhooks\CallStreamingStoppedWebhookEvent
 * @phpstan-import-type CampaignStatusUpdateWebhookEventShape from \Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent
 * @phpstan-import-type ConferenceCreatedWebhookEventShape from \Telnyx\Webhooks\ConferenceCreatedWebhookEvent
 * @phpstan-import-type ConferenceEndedWebhookEventShape from \Telnyx\Webhooks\ConferenceEndedWebhookEvent
 * @phpstan-import-type ConferenceFloorChangedWebhookEventShape from \Telnyx\Webhooks\ConferenceFloorChangedWebhookEvent
 * @phpstan-import-type ConferenceParticipantJoinedWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantJoinedWebhookEvent
 * @phpstan-import-type ConferenceParticipantLeftWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantLeftWebhookEvent
 * @phpstan-import-type ConferenceParticipantPlaybackEndedWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantPlaybackEndedWebhookEvent
 * @phpstan-import-type ConferenceParticipantPlaybackStartedWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantPlaybackStartedWebhookEvent
 * @phpstan-import-type ConferenceParticipantSpeakEndedWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantSpeakEndedWebhookEvent
 * @phpstan-import-type ConferenceParticipantSpeakStartedWebhookEventShape from \Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent
 * @phpstan-import-type ConferencePlaybackEndedWebhookEventShape from \Telnyx\Webhooks\ConferencePlaybackEndedWebhookEvent
 * @phpstan-import-type ConferencePlaybackStartedWebhookEventShape from \Telnyx\Webhooks\ConferencePlaybackStartedWebhookEvent
 * @phpstan-import-type ConferenceRecordingSavedWebhookEventShape from \Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent
 * @phpstan-import-type ConferenceSpeakEndedWebhookEventShape from \Telnyx\Webhooks\ConferenceSpeakEndedWebhookEvent
 * @phpstan-import-type ConferenceSpeakStartedWebhookEventShape from \Telnyx\Webhooks\ConferenceSpeakStartedWebhookEvent
 * @phpstan-import-type DeliveryUpdateWebhookEventShape from \Telnyx\Webhooks\DeliveryUpdateWebhookEvent
 * @phpstan-import-type FaxDeliveredWebhookEventShape from \Telnyx\Webhooks\FaxDeliveredWebhookEvent
 * @phpstan-import-type FaxFailedWebhookEventShape from \Telnyx\Webhooks\FaxFailedWebhookEvent
 * @phpstan-import-type FaxMediaProcessedWebhookEventShape from \Telnyx\Webhooks\FaxMediaProcessedWebhookEvent
 * @phpstan-import-type FaxQueuedWebhookEventShape from \Telnyx\Webhooks\FaxQueuedWebhookEvent
 * @phpstan-import-type FaxSendingStartedWebhookEventShape from \Telnyx\Webhooks\FaxSendingStartedWebhookEvent
 * @phpstan-import-type InboundMessageWebhookEventShape from \Telnyx\Webhooks\InboundMessageWebhookEvent
 * @phpstan-import-type NumberOrderStatusUpdateWebhookEventShape from \Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent
 * @phpstan-import-type ReplacedLinkClickWebhookEventShape from \Telnyx\Webhooks\ReplacedLinkClickWebhookEvent
 * @phpstan-import-type TranscriptionWebhookEventShape from \Telnyx\Webhooks\TranscriptionWebhookEvent
 *
 * @phpstan-type UnwrapWebhookEventVariants = CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdateWebhookEvent|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChangedWebhookEvent|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDeliveredWebhookEvent|FaxFailedWebhookEvent|FaxMediaProcessedWebhookEvent|FaxQueuedWebhookEvent|FaxSendingStartedWebhookEvent|InboundMessageWebhookEvent|NumberOrderStatusUpdateWebhookEvent|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent
 * @phpstan-type UnwrapWebhookEventShape = UnwrapWebhookEventVariants|CallAIGatherEndedWebhookEventShape|CallAIGatherMessageHistoryUpdatedWebhookEventShape|CallAIGatherPartialResultsWebhookEventShape|CallAnsweredWebhookEventShape|CallBridgedWebhookEventShape|CallConversationEndedWebhookEventShape|CallConversationInsightsGeneratedWebhookEventShape|CallDtmfReceivedWebhookEventShape|CallEnqueuedWebhookEventShape|CallForkStartedWebhookEventShape|CallForkStoppedWebhookEventShape|CallGatherEndedWebhookEventShape|CallHangupWebhookEventShape|CallInitiatedWebhookEventShape|CallLeftQueueWebhookEventShape|CallMachineDetectionEndedWebhookEventShape|CallMachineGreetingEndedWebhookEventShape|CallMachinePremiumDetectionEndedWebhookEventShape|CallMachinePremiumGreetingEndedWebhookEventShape|CallPlaybackEndedWebhookEventShape|CallPlaybackStartedWebhookEventShape|CallRecordingErrorWebhookEventShape|CallRecordingSavedWebhookEventShape|CallRecordingTranscriptionSavedWebhookEventShape|CallReferCompletedWebhookEventShape|CallReferFailedWebhookEventShape|CallReferStartedWebhookEventShape|CallSiprecFailedWebhookEventShape|CallSiprecStartedWebhookEventShape|CallSiprecStoppedWebhookEventShape|CallSpeakEndedWebhookEventShape|CallSpeakStartedWebhookEventShape|CallStreamingFailedWebhookEventShape|CallStreamingStartedWebhookEventShape|CallStreamingStoppedWebhookEventShape|CampaignStatusUpdateWebhookEventShape|ConferenceCreatedWebhookEventShape|ConferenceEndedWebhookEventShape|ConferenceFloorChangedWebhookEventShape|ConferenceParticipantJoinedWebhookEventShape|ConferenceParticipantLeftWebhookEventShape|ConferenceParticipantPlaybackEndedWebhookEventShape|ConferenceParticipantPlaybackStartedWebhookEventShape|ConferenceParticipantSpeakEndedWebhookEventShape|ConferenceParticipantSpeakStartedWebhookEventShape|ConferencePlaybackEndedWebhookEventShape|ConferencePlaybackStartedWebhookEventShape|ConferenceRecordingSavedWebhookEventShape|ConferenceSpeakEndedWebhookEventShape|ConferenceSpeakStartedWebhookEventShape|DeliveryUpdateWebhookEventShape|FaxDeliveredWebhookEventShape|FaxFailedWebhookEventShape|FaxMediaProcessedWebhookEventShape|FaxQueuedWebhookEventShape|FaxSendingStartedWebhookEventShape|InboundMessageWebhookEventShape|NumberOrderStatusUpdateWebhookEventShape|ReplacedLinkClickWebhookEventShape|TranscriptionWebhookEventShape
 */
final class UnwrapWebhookEvent implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            CallAIGatherEndedWebhookEvent::class,
            CallAIGatherMessageHistoryUpdatedWebhookEvent::class,
            CallAIGatherPartialResultsWebhookEvent::class,
            CallAnsweredWebhookEvent::class,
            CallBridgedWebhookEvent::class,
            CallConversationEndedWebhookEvent::class,
            CallConversationInsightsGeneratedWebhookEvent::class,
            CallDtmfReceivedWebhookEvent::class,
            CallEnqueuedWebhookEvent::class,
            CallForkStartedWebhookEvent::class,
            CallForkStoppedWebhookEvent::class,
            CallGatherEndedWebhookEvent::class,
            CallHangupWebhookEvent::class,
            CallInitiatedWebhookEvent::class,
            CallLeftQueueWebhookEvent::class,
            CallMachineDetectionEndedWebhookEvent::class,
            CallMachineGreetingEndedWebhookEvent::class,
            CallMachinePremiumDetectionEndedWebhookEvent::class,
            CallMachinePremiumGreetingEndedWebhookEvent::class,
            CallPlaybackEndedWebhookEvent::class,
            CallPlaybackStartedWebhookEvent::class,
            CallRecordingErrorWebhookEvent::class,
            CallRecordingSavedWebhookEvent::class,
            CallRecordingTranscriptionSavedWebhookEvent::class,
            CallReferCompletedWebhookEvent::class,
            CallReferFailedWebhookEvent::class,
            CallReferStartedWebhookEvent::class,
            CallSiprecFailedWebhookEvent::class,
            CallSiprecStartedWebhookEvent::class,
            CallSiprecStoppedWebhookEvent::class,
            CallSpeakEndedWebhookEvent::class,
            CallSpeakStartedWebhookEvent::class,
            CallStreamingFailedWebhookEvent::class,
            CallStreamingStartedWebhookEvent::class,
            CallStreamingStoppedWebhookEvent::class,
            CampaignStatusUpdateWebhookEvent::class,
            ConferenceCreatedWebhookEvent::class,
            ConferenceEndedWebhookEvent::class,
            ConferenceFloorChangedWebhookEvent::class,
            ConferenceParticipantJoinedWebhookEvent::class,
            ConferenceParticipantLeftWebhookEvent::class,
            ConferenceParticipantPlaybackEndedWebhookEvent::class,
            ConferenceParticipantPlaybackStartedWebhookEvent::class,
            ConferenceParticipantSpeakEndedWebhookEvent::class,
            ConferenceParticipantSpeakStartedWebhookEvent::class,
            ConferencePlaybackEndedWebhookEvent::class,
            ConferencePlaybackStartedWebhookEvent::class,
            ConferenceRecordingSavedWebhookEvent::class,
            ConferenceSpeakEndedWebhookEvent::class,
            ConferenceSpeakStartedWebhookEvent::class,
            DeliveryUpdateWebhookEvent::class,
            FaxDeliveredWebhookEvent::class,
            FaxFailedWebhookEvent::class,
            FaxMediaProcessedWebhookEvent::class,
            FaxQueuedWebhookEvent::class,
            FaxSendingStartedWebhookEvent::class,
            InboundMessageWebhookEvent::class,
            NumberOrderStatusUpdateWebhookEvent::class,
            ReplacedLinkClickWebhookEvent::class,
            TranscriptionWebhookEvent::class,
        ];
    }
}
