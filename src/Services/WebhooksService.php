<?php

/**
 * Telnyx webhook verification using ED25519 signatures.
 *
 * This file provides ED25519 signature verification for Telnyx webhooks,
 * matching the implementation pattern used in the Python and Node SDKs.
 *
 * Example usage:
 *
 *     $client = new \Telnyx\Client(
 *         apiKey: $_ENV['TELNYX_API_KEY'],
 *         publicKey: $_ENV['TELNYX_PUBLIC_KEY'], // Base64 from Mission Control
 *     );
 *
 *     // In your webhook handler:
 *     $payload = file_get_contents('php://input');
 *     $headers = getallheaders();
 *
 *     try {
 *         $event = $client->webhooks->unwrap($payload, $headers);
 *         // Signature verified, process $event
 *     } catch (\Telnyx\Core\Exceptions\WebhookVerificationException $e) {
 *         // Signature verification failed
 *         http_response_code(401);
 *     }
 */

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Conversion;
use Telnyx\Core\Exceptions\WebhookException;
use Telnyx\Core\Exceptions\WebhookVerificationException;
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
    private const SIGNATURE_HEADER = 'telnyx-signature-ed25519';
    private const TIMESTAMP_HEADER = 'telnyx-timestamp';
    private const DEFAULT_TOLERANCE = 300; // 5 minutes in seconds

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
     * Unwrap a webhook payload without verification.
     *
     * Unwraps a webhook event from its JSON representation.
     *
     * @param string $body The raw webhook payload (JSON string)
     *
     * @throws WebhookException
     */
    public function unsafeUnwrap(
        string $body
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
        ?string $secret = null,
        ?int $tolerance = null
    ): CallAIGatherEndedWebhookEvent|CallAIGatherMessageHistoryUpdatedWebhookEvent|CallAIGatherPartialResultsWebhookEvent|CallAnsweredWebhookEvent|CallBridgedWebhookEvent|CallConversationEndedWebhookEvent|CallConversationInsightsGeneratedWebhookEvent|CallDtmfReceivedWebhookEvent|CallEnqueuedWebhookEvent|CallForkStartedWebhookEvent|CallForkStoppedWebhookEvent|CallGatherEndedWebhookEvent|CallHangupWebhookEvent|CallInitiatedWebhookEvent|CallLeftQueueWebhookEvent|CallMachineDetectionEndedWebhookEvent|CallMachineGreetingEndedWebhookEvent|CallMachinePremiumDetectionEndedWebhookEvent|CallMachinePremiumGreetingEndedWebhookEvent|CallPlaybackEndedWebhookEvent|CallPlaybackStartedWebhookEvent|CallRecordingErrorWebhookEvent|CallRecordingSavedWebhookEvent|CallRecordingTranscriptionSavedWebhookEvent|CallReferCompletedWebhookEvent|CallReferFailedWebhookEvent|CallReferStartedWebhookEvent|CallSiprecFailedWebhookEvent|CallSiprecStartedWebhookEvent|CallSiprecStoppedWebhookEvent|CallSpeakEndedWebhookEvent|CallSpeakStartedWebhookEvent|CallStreamingFailedWebhookEvent|CallStreamingStartedWebhookEvent|CallStreamingStoppedWebhookEvent|CampaignStatusUpdate|ConferenceCreatedWebhookEvent|ConferenceEndedWebhookEvent|ConferenceFloorChanged|ConferenceParticipantJoinedWebhookEvent|ConferenceParticipantLeftWebhookEvent|ConferenceParticipantPlaybackEndedWebhookEvent|ConferenceParticipantPlaybackStartedWebhookEvent|ConferenceParticipantSpeakEndedWebhookEvent|ConferenceParticipantSpeakStartedWebhookEvent|ConferencePlaybackEndedWebhookEvent|ConferencePlaybackStartedWebhookEvent|ConferenceRecordingSavedWebhookEvent|ConferenceSpeakEndedWebhookEvent|ConferenceSpeakStartedWebhookEvent|DeliveryUpdateWebhookEvent|FaxDelivered|FaxFailed|FaxMediaProcessed|FaxQueued|FaxSendingStarted|InboundMessageWebhookEvent|NumberOrderStatusUpdate|ReplacedLinkClickWebhookEvent|TranscriptionWebhookEvent {
        try {
            if (null !== $headers) {
                $this->verifySignature($body, $headers, $secret, $tolerance);
            }
        } catch (WebhookVerificationException $e) {
            throw new WebhookException('Could not verify webhook event signature', previous: $e);
        }

        try {
            $decoded = Util::decodeJson($body);

            // @phpstan-ignore return.type
            return Conversion::coerce(UnwrapWebhookEvent::class, value: $decoded);
        } catch (\Throwable $e) {
            throw new WebhookException('Error parsing webhook body', previous: $e);
        }
    }

    /**
     * Verify a webhook signature.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers
     * @param string|null $publicKey Optional public key override
     * @param int|null $tolerance Optional timestamp tolerance in seconds
     *
     * @return bool True if signature is valid
     *
     * @throws WebhookVerificationException If verification fails
     */
    public function verify(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = null
    ): bool {
        $this->verifySignature($payload, $headers, $publicKey, $tolerance);

        return true;
    }

    /**
     * Internal method to verify the webhook signature.
     *
     * @param string $payload The raw webhook payload
     * @param array<string, string|list<string>> $headers The HTTP headers
     * @param string|null $publicKey Optional public key override
     * @param int|null $tolerance Optional timestamp tolerance in seconds
     *
     * @throws WebhookVerificationException If verification fails
     */
    private function verifySignature(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = null
    ): void {
        // Normalize headers to lowercase keys
        $normalizedHeaders = [];
        foreach ($headers as $key => $value) {
            $normalizedHeaders[strtolower($key)] = is_array($value) ? $value[0] : $value;
        }

        // Extract required headers
        $signature = $normalizedHeaders[self::SIGNATURE_HEADER] ?? null;
        $timestamp = $normalizedHeaders[self::TIMESTAMP_HEADER] ?? null;

        if (null === $signature || '' === $signature) {
            throw new WebhookVerificationException(
                'Missing required header: '.self::SIGNATURE_HEADER
            );
        }

        if (null === $timestamp || '' === $timestamp) {
            throw new WebhookVerificationException(
                'Missing required header: '.self::TIMESTAMP_HEADER
            );
        }

        // Validate timestamp to prevent replay attacks
        $tolerance = $tolerance ?? self::DEFAULT_TOLERANCE;
        $webhookTime = (int) $timestamp;
        $currentTime = time();

        if (abs($currentTime - $webhookTime) > $tolerance) {
            throw new WebhookVerificationException(
                'Webhook timestamp is outside the allowed tolerance window'
            );
        }

        // Get the public key
        $key = $publicKey ?? $this->client->publicKey;
        if ('' === $key) {
            throw new WebhookVerificationException(
                'Public key is required for webhook verification. '
                .'Set it via the Client constructor or TELNYX_PUBLIC_KEY environment variable.'
            );
        }

        // Decode the base64-encoded public key
        $publicKeyBytes = base64_decode($key, true);
        if (false === $publicKeyBytes || SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES !== strlen($publicKeyBytes)) {
            throw new WebhookVerificationException(
                'Invalid public key: expected '.SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES.' bytes after base64 decoding'
            );
        }

        // Decode the base64-encoded signature
        $signatureBytes = base64_decode($signature, true);
        if (false === $signatureBytes || SODIUM_CRYPTO_SIGN_BYTES !== strlen($signatureBytes)) {
            throw new WebhookVerificationException(
                'Invalid signature format: expected '.SODIUM_CRYPTO_SIGN_BYTES.' bytes after base64 decoding'
            );
        }

        // Build the signed payload: "{timestamp}|{payload}"
        $signedPayload = $timestamp.'|'.$payload;

        // Verify the ED25519 signature using sodium
        $isValid = sodium_crypto_sign_verify_detached(
            $signatureBytes,
            $signedPayload,
            $publicKeyBytes
        );

        if (!$isValid) {
            throw new WebhookVerificationException(
                'Webhook signature verification failed: signature does not match payload'
            );
        }
    }
}
