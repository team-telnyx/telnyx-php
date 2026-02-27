<?php

declare(strict_types=1);

namespace Telnyx\Services;

use StandardWebhooks\Exception\WebhookVerificationException;
use StandardWebhooks\Webhook;
use Telnyx\Client;
use Telnyx\Core\Conversion;
use Telnyx\Core\Exceptions\WebhookException;
use Telnyx\Core\Util;
use Telnyx\ServiceContracts\WebhooksContract;
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
use Telnyx\Webhooks\UnsafeUnwrapWebhookEvent;
use Telnyx\Webhooks\UnwrapWebhookEvent;

final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Unwraps a webhook event from its JSON representation.
     *
     * @param array<string,string|list<string>>|null $headers
     *
     * @throws WebhookException
     */
    public function unsafeUnwrap(
        string $body,
        ?array $headers = null,
        ?string $secret = null
    ): CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent {
        try {
            $decoded = Util::decodeJson($body);

            // @phpstan-ignore return.type
            return Conversion::coerce(UnsafeUnwrapWebhookEvent::class, value: $decoded);
        } catch (\Throwable $e) {
            throw new WebhookException('Error parsing webhook body', previous: $e);
        }
    }

    /**
     * @api
     *
     * Unwraps a webhook event from its JSON representation.
     *
     * @param array<string,string|list<string>>|null $headers
     *
     * @throws WebhookException
     */
    public function unwrap(
        string $body,
        ?array $headers = null,
        ?string $secret = null
    ): CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent {
        if (null !== $headers) {
            $secret = $secret ?? ($this->client->publicKey ?: null);
            if (null === $secret) {
                throw new WebhookException('Webhook key must not be null in order to unwrap');
            }

            try {
                $flatHeaders = array_map(fn (string|array $v): string => is_array($v) ? $v[0] : $v, $headers);
                $webhook = new Webhook($secret);
                $webhook->verify($body, $flatHeaders);
            } catch (WebhookVerificationException $e) {
                throw new WebhookException('Could not verify webhook event signature', previous: $e);
            }
        }

        try {
            $decoded = Util::decodeJson($body);

            // @phpstan-ignore return.type
            return Conversion::coerce(UnwrapWebhookEvent::class, value: $decoded);
        } catch (\Throwable $e) {
            throw new WebhookException('Error parsing webhook body', previous: $e);
        }
    }
}
