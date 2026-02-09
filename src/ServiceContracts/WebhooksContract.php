<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Webhooks\UnwrapWebhookEvent;
use Telnyx\Webhooks\UnsafeUnwrapWebhookEvent;

interface WebhooksContract
{
    /**
     * Verify and unwrap a webhook payload.
     *
     * Verifies the ED25519 signature using the provided headers and returns
     * the parsed webhook event. Throws an exception if verification fails.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers from the webhook request
     * @param string|null $publicKey Optional public key override (defaults to client's publicKey)
     * @param int|null $tolerance Optional timestamp tolerance in seconds (defaults to 300 = 5 minutes)
     * @return UnwrapWebhookEvent The verified and parsed webhook event
     * @throws \Telnyx\Core\Exceptions\WebhookVerificationException If signature verification fails
     */
    public function unwrap(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = null
    ): UnwrapWebhookEvent;

    /**
     * Unwrap a webhook payload without verification.
     *
     * Parses the webhook payload without verifying the signature.
     * Use with caution - only for testing or when verification is handled elsewhere.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @return UnsafeUnwrapWebhookEvent The parsed webhook event (unverified)
     */
    public function unsafeUnwrap(string $payload): UnsafeUnwrapWebhookEvent;

    /**
     * Verify a webhook signature without parsing the payload.
     *
     * @param string $payload The raw webhook payload (JSON string)
     * @param array<string, string|list<string>> $headers The HTTP headers from the webhook request
     * @param string|null $publicKey Optional public key override (defaults to client's publicKey)
     * @param int|null $tolerance Optional timestamp tolerance in seconds (defaults to 300 = 5 minutes)
     * @return bool True if signature is valid
     * @throws \Telnyx\Core\Exceptions\WebhookVerificationException If verification fails
     */
    public function verify(
        string $payload,
        array $headers,
        ?string $publicKey = null,
        ?int $tolerance = null
    ): bool;
}
