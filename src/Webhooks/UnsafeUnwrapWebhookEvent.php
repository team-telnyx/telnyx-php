<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

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
            CustomerServiceRecordStatusChangedWebhookEvent::class,
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
            StreamingFailedWebhookEvent::class,
            StreamingStartedWebhookEvent::class,
            StreamingStoppedWebhookEvent::class,
            TranscriptionWebhookEvent::class,
        ];
    }
}
