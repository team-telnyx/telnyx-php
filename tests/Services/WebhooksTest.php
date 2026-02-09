<?php

/**
 * Tests for Telnyx webhook ED25519 signature verification.
 *
 * These tests verify that the webhook verification implementation correctly:
 * - Validates ED25519 signatures
 * - Checks required headers
 * - Enforces timestamp tolerance
 * - Handles edge cases
 */

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Exceptions\WebhookVerificationException;
use Telnyx\Services\WebhooksService;

/**
 * @internal
 */
#[CoversClass(WebhooksService::class)]
final class WebhooksTest extends TestCase
{
    // Test key pair generated for testing purposes only
    // Public key (base64): bJVpJWCId4UJl2qJYspYmY9bZD8pLZlPr/PIoLj/jz8=
    // Secret key (base64): K+/S5RuSEtOgJvtLNxJPUkOmFJAQq0h+A5MFu5q1sCFslWklYIh3hQmXaoliyliZj1tkPyktmU+v88iguP+PPw==
    private const TEST_PUBLIC_KEY = 'bJVpJWCId4UJl2qJYspYmY9bZD8pLZlPr/PIoLj/jz8=';
    private const TEST_SECRET_KEY = 'K+/S5RuSEtOgJvtLNxJPUkOmFJAQq0h+A5MFu5q1sCFslWklYIh3hQmXaoliyliZj1tkPyktmU+v88iguP+PPw==';

    private Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(
            apiKey: 'test-api-key',
            publicKey: self::TEST_PUBLIC_KEY
        );
    }

    /**
     * Helper method to sign a payload with the test secret key.
     *
     * @param string $payload The payload to sign
     * @param string $timestamp The timestamp to use
     * @return string Base64-encoded signature
     */
    private function signPayload(string $payload, string $timestamp): string
    {
        $secretKey = base64_decode(self::TEST_SECRET_KEY);
        $signedPayload = $timestamp . '|' . $payload;
        $signature = sodium_crypto_sign_detached($signedPayload, $secretKey);
        return base64_encode($signature);
    }

    #[Test]
    public function verifyValidSignature(): void
    {
        $payload = '{"data":{"event_type":"message.received","id":"test-123"}}';
        $timestamp = (string) time();
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        // Should not throw
        $result = $this->client->webhooks->verify($payload, $headers);
        $this->assertTrue($result);
    }

    #[Test]
    public function unwrapValidWebhook(): void
    {
        $payload = '{"data":{"event_type":"message.received","id":"test-123","payload":{"text":"Hello"}}}';
        $timestamp = (string) time();
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        $event = $this->client->webhooks->unwrap($payload, $headers);
        $this->assertNotNull($event);
    }

    #[Test]
    public function unsafeUnwrapWithoutVerification(): void
    {
        $payload = '{"data":{"event_type":"message.received","id":"test-123"}}';

        // Should not throw even without headers
        $event = $this->client->webhooks->unsafeUnwrap($payload);
        $this->assertNotNull($event);
    }

    #[Test]
    public function rejectInvalidSignature(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();

        // Use a fake signature
        $headers = [
            'telnyx-signature-ed25519' => base64_encode(str_repeat('x', 64)),
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('signature does not match');
        $this->client->webhooks->verify($payload, $headers);
    }

    #[Test]
    public function rejectTamperedPayload(): void
    {
        $originalPayload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();
        $signature = $this->signPayload($originalPayload, $timestamp);

        // Tamper with the payload after signing
        $tamperedPayload = '{"data":{"event_type":"message.received","tampered":true}}';

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('signature does not match');
        $this->client->webhooks->verify($tamperedPayload, $headers);
    }

    #[Test]
    public function rejectMissingSignatureHeader(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';

        $headers = [
            'telnyx-timestamp' => (string) time(),
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('Missing required header: telnyx-signature-ed25519');
        $this->client->webhooks->verify($payload, $headers);
    }

    #[Test]
    public function rejectMissingTimestampHeader(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';

        $headers = [
            'telnyx-signature-ed25519' => base64_encode(str_repeat('x', 64)),
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('Missing required header: telnyx-timestamp');
        $this->client->webhooks->verify($payload, $headers);
    }

    #[Test]
    public function rejectExpiredTimestamp(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        // Timestamp from 10 minutes ago (outside 5 minute tolerance)
        $timestamp = (string) (time() - 600);
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('timestamp is outside the allowed tolerance');
        $this->client->webhooks->verify($payload, $headers);
    }

    #[Test]
    public function acceptTimestampWithinTolerance(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        // Timestamp from 2 minutes ago (within 5 minute tolerance)
        $timestamp = (string) (time() - 120);
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        $result = $this->client->webhooks->verify($payload, $headers);
        $this->assertTrue($result);
    }

    #[Test]
    public function acceptCustomTolerance(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        // Timestamp from 10 minutes ago
        $timestamp = (string) (time() - 600);
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        // Should pass with 15 minute tolerance
        $result = $this->client->webhooks->verify($payload, $headers, tolerance: 900);
        $this->assertTrue($result);
    }

    #[Test]
    public function handleCaseInsensitiveHeaders(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();
        $signature = $this->signPayload($payload, $timestamp);

        // Use different casing for headers
        $headers = [
            'Telnyx-Signature-Ed25519' => $signature,
            'TELNYX-TIMESTAMP' => $timestamp,
        ];

        $result = $this->client->webhooks->verify($payload, $headers);
        $this->assertTrue($result);
    }

    #[Test]
    public function acceptPublicKeyOverride(): void
    {
        // Create client without public key
        $clientWithoutKey = new Client(apiKey: 'test-api-key');

        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();
        $signature = $this->signPayload($payload, $timestamp);

        $headers = [
            'telnyx-signature-ed25519' => $signature,
            'telnyx-timestamp' => $timestamp,
        ];

        // Should work with explicit public key override
        $result = $clientWithoutKey->webhooks->verify(
            $payload,
            $headers,
            publicKey: self::TEST_PUBLIC_KEY
        );
        $this->assertTrue($result);
    }

    #[Test]
    public function rejectMissingPublicKey(): void
    {
        // Create client without public key
        $clientWithoutKey = new Client(apiKey: 'test-api-key');

        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();

        $headers = [
            'telnyx-signature-ed25519' => base64_encode(str_repeat('x', 64)),
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('Public key is required');
        $clientWithoutKey->webhooks->verify($payload, $headers);
    }

    #[Test]
    public function rejectInvalidPublicKeyFormat(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();

        $headers = [
            'telnyx-signature-ed25519' => base64_encode(str_repeat('x', 64)),
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('Invalid public key');
        $this->client->webhooks->verify($payload, $headers, publicKey: 'invalid-key');
    }

    #[Test]
    public function rejectInvalidSignatureFormat(): void
    {
        $payload = '{"data":{"event_type":"message.received"}}';
        $timestamp = (string) time();

        $headers = [
            'telnyx-signature-ed25519' => 'not-valid-base64!!!',
            'telnyx-timestamp' => $timestamp,
        ];

        $this->expectException(WebhookVerificationException::class);
        $this->expectExceptionMessage('Invalid signature format');
        $this->client->webhooks->verify($payload, $headers);
    }
}
