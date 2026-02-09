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
use Telnyx\Core\Exceptions\WebhookVerificationException;
use Telnyx\ServiceContracts\WebhooksContract;
use Telnyx\Webhooks\UnwrapWebhookEvent;
use Telnyx\Webhooks\UnsafeUnwrapWebhookEvent;

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
     * Verify and unwrap a webhook payload.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers
     * @param string|null $publicKey Optional public key override
     * @param int|null $tolerance Optional timestamp tolerance in seconds
     * @return UnwrapWebhookEvent The verified webhook event
     * @throws WebhookVerificationException If verification fails
     */
    public function unwrap(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = null
    ): UnwrapWebhookEvent {
        $this->verifySignature($payload, $headers, $publicKey, $tolerance);

        return $this->parseWebhookEvent($payload, UnwrapWebhookEvent::class);
    }

    /**
     * Unwrap a webhook payload without verification.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @return UnsafeUnwrapWebhookEvent The parsed webhook event (unverified)
     */
    public function unsafeUnwrap(string $payload): UnsafeUnwrapWebhookEvent
    {
        return $this->parseWebhookEvent($payload, UnsafeUnwrapWebhookEvent::class);
    }

    /**
     * Parse a webhook payload into a typed event.
     *
     * @template T of UnwrapWebhookEvent|UnsafeUnwrapWebhookEvent
     * @param string $payload The raw webhook payload (JSON string)
     * @param class-string<T> $eventClass The event class to use
     * @return T The parsed webhook event
     */
    private function parseWebhookEvent(string $payload, string $eventClass): UnwrapWebhookEvent|UnsafeUnwrapWebhookEvent
    {
        $data = json_decode($payload, true, 512, JSON_THROW_ON_ERROR);
        $converter = $eventClass::converter();
        $state = new \Telnyx\Core\Conversion\CoerceState();
        return $converter->coerce($data, $state);
    }

    /**
     * Verify a webhook signature.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers
     * @param string|null $publicKey Optional public key override
     * @param int|null $tolerance Optional timestamp tolerance in seconds
     * @return bool True if signature is valid
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

        if ($signature === null || $signature === '') {
            throw new WebhookVerificationException(
                'Missing required header: ' . self::SIGNATURE_HEADER
            );
        }

        if ($timestamp === null || $timestamp === '') {
            throw new WebhookVerificationException(
                'Missing required header: ' . self::TIMESTAMP_HEADER
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
        if ($key === '' || $key === null) {
            throw new WebhookVerificationException(
                'Public key is required for webhook verification. ' .
                'Set it via the Client constructor or TELNYX_PUBLIC_KEY environment variable.'
            );
        }

        // Decode the base64-encoded public key
        $publicKeyBytes = base64_decode($key, true);
        if ($publicKeyBytes === false || strlen($publicKeyBytes) !== SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES) {
            throw new WebhookVerificationException(
                'Invalid public key: expected ' . SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES . ' bytes after base64 decoding'
            );
        }

        // Decode the base64-encoded signature
        $signatureBytes = base64_decode($signature, true);
        if ($signatureBytes === false || strlen($signatureBytes) !== SODIUM_CRYPTO_SIGN_BYTES) {
            throw new WebhookVerificationException(
                'Invalid signature format: expected ' . SODIUM_CRYPTO_SIGN_BYTES . ' bytes after base64 decoding'
            );
        }

        // Build the signed payload: "{timestamp}|{payload}"
        $signedPayload = $timestamp . '|' . $payload;

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
