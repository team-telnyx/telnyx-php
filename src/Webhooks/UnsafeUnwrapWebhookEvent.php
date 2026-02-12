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
 * @phpstan-import-type CallBridgedShape from \Telnyx\Webhooks\CallBridged
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
 * @phpstan-import-type CampaignStatusUpdateShape from \Telnyx\Webhooks\CampaignStatusUpdate
 * @phpstan-import-type ConferenceCreatedWebhookEventShape from \Telnyx\Webhooks\ConferenceCreatedWebhookEvent
 * @phpstan-import-type ConferenceEndedWebhookEventShape from \Telnyx\Webhooks\ConferenceEndedWebhookEvent
 * @phpstan-import-type ConferenceFloorChangedShape from \Telnyx\Webhooks\ConferenceFloorChanged
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
 * @phpstan-import-type FaxDeliveredShape from \Telnyx\Webhooks\FaxDelivered
 * @phpstan-import-type FaxFailedShape from \Telnyx\Webhooks\FaxFailed
 * @phpstan-import-type FaxMediaProcessedShape from \Telnyx\Webhooks\FaxMediaProcessed
 * @phpstan-import-type FaxQueuedShape from \Telnyx\Webhooks\FaxQueued
 * @phpstan-import-type FaxSendingStartedShape from \Telnyx\Webhooks\FaxSendingStarted
 * @phpstan-import-type InboundMessageWebhookEventShape from \Telnyx\Webhooks\InboundMessageWebhookEvent
 * @phpstan-import-type NumberOrderStatusUpdateShape from \Telnyx\Webhooks\NumberOrderStatusUpdate
 * @phpstan-import-type ReplacedLinkClickWebhookEventShape from \Telnyx\Webhooks\ReplacedLinkClickWebhookEvent
 * @phpstan-import-type TranscriptionWebhookEventShape from \Telnyx\Webhooks\TranscriptionWebhookEvent
 *
 * @phpstan-type UnsafeUnwrapWebhookEventVariants = CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridged|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent
 * @phpstan-type UnsafeUnwrapWebhookEventShape = UnsafeUnwrapWebhookEventVariants|CallAIGatherEndedWebhookEventShape|CallAIGatherMessageHistoryUpdatedWebhookEventShape|CallAIGatherPartialResultsWebhookEventShape|CallAnsweredWebhookEventShape|CallBridgedShape|CallConversationEndedWebhookEventShape|CallConversationInsightsGeneratedWebhookEventShape|CallDtmfReceivedWebhookEventShape|CallEnqueuedWebhookEventShape|CallForkStartedWebhookEventShape|CallForkStoppedWebhookEventShape|CallGatherEndedWebhookEventShape|CallHangupWebhookEventShape|CallInitiatedWebhookEventShape|CallLeftQueueWebhookEventShape|CallMachineDetectionEndedWebhookEventShape|CallMachineGreetingEndedWebhookEventShape|CallMachinePremiumDetectionEndedWebhookEventShape|CallMachinePremiumGreetingEndedWebhookEventShape|CallPlaybackEndedWebhookEventShape|CallPlaybackStartedWebhookEventShape|CallRecordingErrorWebhookEventShape|CallRecordingSavedWebhookEventShape|CallRecordingTranscriptionSavedWebhookEventShape|CallReferCompletedWebhookEventShape|CallReferFailedWebhookEventShape|CallReferStartedWebhookEventShape|CallSiprecFailedWebhookEventShape|CallSiprecStartedWebhookEventShape|CallSiprecStoppedWebhookEventShape|CallSpeakEndedWebhookEventShape|CallSpeakStartedWebhookEventShape|CallStreamingFailedWebhookEventShape|CallStreamingStartedWebhookEventShape|CallStreamingStoppedWebhookEventShape|CampaignStatusUpdateShape|ConferenceCreatedWebhookEventShape|ConferenceEndedWebhookEventShape|ConferenceFloorChangedShape|ConferenceParticipantJoinedWebhookEventShape|ConferenceParticipantLeftWebhookEventShape|ConferenceParticipantPlaybackEndedWebhookEventShape|ConferenceParticipantPlaybackStartedWebhookEventShape|ConferenceParticipantSpeakEndedWebhookEventShape|ConferenceParticipantSpeakStartedWebhookEventShape|ConferencePlaybackEndedWebhookEventShape|ConferencePlaybackStartedWebhookEventShape|ConferenceRecordingSavedWebhookEventShape|ConferenceSpeakEndedWebhookEventShape|ConferenceSpeakStartedWebhookEventShape|DeliveryUpdateWebhookEventShape|FaxDeliveredShape|FaxFailedShape|FaxMediaProcessedShape|FaxQueuedShape|FaxSendingStartedShape|InboundMessageWebhookEventShape|NumberOrderStatusUpdateShape|ReplacedLinkClickWebhookEventShape|TranscriptionWebhookEventShape
 */
final class UnsafeUnwrapWebhookEvent implements ConverterSource
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
            CallBridged::class,
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
            CampaignStatusUpdate::class,
            ConferenceCreatedWebhookEvent::class,
            ConferenceEndedWebhookEvent::class,
            ConferenceFloorChanged::class,
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
            FaxDelivered::class,
            FaxFailed::class,
            FaxMediaProcessed::class,
            FaxQueued::class,
            FaxSendingStarted::class,
            InboundMessageWebhookEvent::class,
            NumberOrderStatusUpdate::class,
            ReplacedLinkClickWebhookEvent::class,
            TranscriptionWebhookEvent::class,
        ];
    }
}
