<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\WebhookException;
use Telnyx\Core\Exceptions\WebhookVerificationException;
use Telnyx\Webhooks\CallAIGatherEndedWebhookEvent;
use Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent;
use Telnyx\Webhooks\CallAIGatherPartialResultsWebhookEvent;
use Telnyx\Webhooks\CallAnsweredWebhookEvent;
use Telnyx\Webhooks\CallBridgedWebhookEvent;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent;
use Telnyx\Webhooks\CallDtmfReceivedWebhookEvent;
use Telnyx\Webhooks\CallEnqueuedWebhookEvent;
use Telnyx\Webhooks\CallForkStartedWebhookEvent;
use Telnyx\Webhooks\CallForkStoppedWebhookEvent;
use Telnyx\Webhooks\CallGatherEndedWebhookEvent;
use Telnyx\Webhooks\CallHangupWebhookEvent;
use Telnyx\Webhooks\CallInitiatedWebhookEvent;
use Telnyx\Webhooks\CallLeftQueueWebhookEvent;
use Telnyx\Webhooks\CallMachineDetectionEndedWebhookEvent;
use Telnyx\Webhooks\CallMachineGreetingEndedWebhookEvent;
use Telnyx\Webhooks\CallMachinePremiumDetectionEndedWebhookEvent;
use Telnyx\Webhooks\CallMachinePremiumGreetingEndedWebhookEvent;
use Telnyx\Webhooks\CallPlaybackEndedWebhookEvent;
use Telnyx\Webhooks\CallPlaybackStartedWebhookEvent;
use Telnyx\Webhooks\CallRecordingErrorWebhookEvent;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent;
use Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent;
use Telnyx\Webhooks\CallReferCompletedWebhookEvent;
use Telnyx\Webhooks\CallReferFailedWebhookEvent;
use Telnyx\Webhooks\CallReferStartedWebhookEvent;
use Telnyx\Webhooks\CallSiprecFailedWebhookEvent;
use Telnyx\Webhooks\CallSiprecStartedWebhookEvent;
use Telnyx\Webhooks\CallSiprecStoppedWebhookEvent;
use Telnyx\Webhooks\CallSpeakEndedWebhookEvent;
use Telnyx\Webhooks\CallSpeakStartedWebhookEvent;
use Telnyx\Webhooks\CallStreamingFailedWebhookEvent;
use Telnyx\Webhooks\CallStreamingStartedWebhookEvent;
use Telnyx\Webhooks\CallStreamingStoppedWebhookEvent;
use Telnyx\Webhooks\CampaignStatusUpdate;
use Telnyx\Webhooks\ConferenceCreatedWebhookEvent;
use Telnyx\Webhooks\ConferenceEndedWebhookEvent;
use Telnyx\Webhooks\ConferenceFloorChanged;
use Telnyx\Webhooks\ConferenceParticipantJoinedWebhookEvent;
use Telnyx\Webhooks\ConferenceParticipantLeftWebhookEvent;
use Telnyx\Webhooks\ConferenceParticipantPlaybackEndedWebhookEvent;
use Telnyx\Webhooks\ConferenceParticipantPlaybackStartedWebhookEvent;
use Telnyx\Webhooks\ConferenceParticipantSpeakEndedWebhookEvent;
use Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent;
use Telnyx\Webhooks\ConferencePlaybackEndedWebhookEvent;
use Telnyx\Webhooks\ConferencePlaybackStartedWebhookEvent;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent;
use Telnyx\Webhooks\ConferenceSpeakEndedWebhookEvent;
use Telnyx\Webhooks\ConferenceSpeakStartedWebhookEvent;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent;
use Telnyx\Webhooks\FaxDelivered;
use Telnyx\Webhooks\FaxFailed;
use Telnyx\Webhooks\FaxMediaProcessed;
use Telnyx\Webhooks\FaxQueued;
use Telnyx\Webhooks\FaxSendingStarted;
use Telnyx\Webhooks\InboundMessageWebhookEvent;
use Telnyx\Webhooks\NumberOrderStatusUpdate;
use Telnyx\Webhooks\ReplacedLinkClickWebhookEvent;
use Telnyx\Webhooks\TranscriptionWebhookEvent;

interface WebhooksContract
{
    /**
     * @api
     *
     * Parses the webhook payload without verifying the signature.
     * Use with caution - only for testing or when verification is handled elsewhere.
     *
     * @param string $body The raw webhook payload (JSON string)
     *
     * @throws WebhookException
     */
    public function unsafeUnwrap(
        string $body
    ): CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent;

    /**
     * @api
     *
     * Verifies the ED25519 signature using the provided headers and returns
     * the parsed webhook event. Throws an exception if verification fails.
     *
     * @param string $body The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers from the webhook request
     * @param string|null $secret Optional secret override (defaults to client's secret)
     * @param int|null $tolerance Optional timestamp tolerance in seconds (defaults to 300 = 5 minutes)
     *
     * @throws WebhookVerificationException If signature verification fails
     */
    public function unwrap(
        string $body,
        ?array $headers = null,
        ?string $secret = null,
        ?int $tolerance = null
    ): CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent;

    /**
     * Verify a webhook signature without parsing the payload.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers from the webhook request
     * @param string|null $publicKey Optional public key override (defaults to client's publicKey)
     * @param int|null $tolerance Optional timestamp tolerance in seconds (defaults to 300 = 5 minutes)
     *
     * @return bool True if signature is valid
     *
     * @throws WebhookVerificationException If verification fails
     */
    public function verify(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = 300,
    ): bool;
}
