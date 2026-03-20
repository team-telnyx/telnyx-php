<?php

/**
 * Telnyx webhook verification using ED25519 signatures.
 *
 * This trait replaces StandardWebhooks verification with native ED25519
 * signature verification, which is what Telnyx actually uses.
 *
 * The trait is kept in a separate file (src/Lib/) to avoid merge conflicts
 * when Stainless updates webhook event types in the generated code.
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
 *         // Option 1: Verify signature only
 *         $client->webhooks->verify($payload, $headers);
 *
 *         // Option 2: Verify and parse in one call
 *         $event = $client->webhooks->unwrap($payload, $headers);
 *     } catch (\Telnyx\Core\Exceptions\WebhookVerificationException $e) {
 *         http_response_code(401);
 *         exit;
 *     }
 */

declare(strict_types=1);

namespace Telnyx\Lib;

use Telnyx\Core\Exceptions\WebhookVerificationException;

/**
 * Trait providing ED25519 webhook signature verification.
 *
 * This replaces the StandardWebhooks library with native sodium-based
 * ED25519 verification, matching the Python and Node SDK implementations.
 */
trait WebhookVerification
{
    private const WEBHOOK_SIGNATURE_HEADER = 'telnyx-signature-ed25519';
    private const WEBHOOK_TIMESTAMP_HEADER = 'telnyx-timestamp';
    private const WEBHOOK_DEFAULT_TOLERANCE = 300; // 5 minutes in seconds

    /**
     * Verify a webhook signature without parsing the payload.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers HTTP headers from the webhook request
     * @param string|null $publicKey Optional public key override (defaults to client's publicKey)
     * @param int|null $tolerance Timestamp tolerance in seconds (defaults to 300 = 5 minutes)
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
        $this->doVerifySignature($payload, $headers, $publicKey, $tolerance);
        return true;
    }

    /**
     * Verify webhook signature using ED25519.
     *
     * Called by unwrap() to verify signature before parsing.
     *
     * @param string $payload The raw webhook payload
     * @param array<string, string|list<string>> $headers HTTP headers
     * @param string|null $publicKey Optional public key override
     * @param int|null $tolerance Timestamp tolerance in seconds
     *
     * @throws WebhookVerificationException If verification fails
     */
    protected function doVerifySignature(
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
        $signature = $normalizedHeaders[self::WEBHOOK_SIGNATURE_HEADER] ?? null;
        $timestamp = $normalizedHeaders[self::WEBHOOK_TIMESTAMP_HEADER] ?? null;

        if (null === $signature || '' === $signature) {
            throw new WebhookVerificationException(
                'Missing required header: ' . self::WEBHOOK_SIGNATURE_HEADER
            );
        }

        if (null === $timestamp || '' === $timestamp) {
            throw new WebhookVerificationException(
                'Missing required header: ' . self::WEBHOOK_TIMESTAMP_HEADER
            );
        }

        // Validate timestamp to prevent replay attacks
        $tolerance = $tolerance ?? self::WEBHOOK_DEFAULT_TOLERANCE;
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
                'Public key is required for webhook verification. ' .
                'Set it via the Client constructor or TELNYX_PUBLIC_KEY environment variable.'
            );
        }

        // Decode the base64-encoded public key
        $publicKeyBytes = base64_decode($key, true);
        if (false === $publicKeyBytes || SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES !== strlen($publicKeyBytes)) {
            throw new WebhookVerificationException(
                'Invalid public key: expected ' . SODIUM_CRYPTO_SIGN_PUBLICKEYBYTES . ' bytes after base64 decoding'
            );
        }

        // Decode the base64-encoded signature
        $signatureBytes = base64_decode($signature, true);
        if (false === $signatureBytes || SODIUM_CRYPTO_SIGN_BYTES !== strlen($signatureBytes)) {
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
