<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use StandardWebhooks\Webhook;
use Telnyx\Client;
use Telnyx\Core\Exceptions\WebhookException;
use Telnyx\Core\Util;

/**
 * @internal
 */
#[CoversNothing]
final class WebhooksTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testUnsafeUnwrap(): void
    {
        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $this->client->webhooks->unsafeUnwrap($payload);
        // unwrap successful if not error thrown, increment assertion count to avoid risky test warning
        $this->addToAssertionCount(1);
    }

    #[Test]
    public function testUnsafeUnwrapBadJson(): void
    {
        $this->expectException(WebhookException::class);

        $badPayload = 'not a json string';
        $this->client->webhooks->unsafeUnwrap($badPayload);
    }

    #[Test]
    public function testUnwrap(): void
    {
        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $this->client->webhooks->unwrap($payload);
        // unwrap successful if not error thrown, increment assertion count to avoid risky test warning
        $this->addToAssertionCount(1);
    }

    #[Test]
    public function testUnwrapBadJson(): void
    {
        $this->expectException(WebhookException::class);

        $badPayload = 'not a json string';
        $this->client->webhooks->unwrap($badPayload);
    }

    #[Test]
    public function testUnwrapWithVerification(): void
    {
        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $secret = 'whsec_c2VjcmV0Cg==';
        $webhook = new Webhook($secret);
        $messageId = '1';
        $timestamp = time();
        $signature = $webhook->sign($messageId, $timestamp, $payload);

        /** @var array<string, list<string>> $headers */
        $headers = [
            'webhook-signature' => [$signature],
            'webhook-id' => [$messageId],
            'webhook-timestamp' => [(string) $timestamp],
        ];
        $this->client->webhooks->unwrap($payload, $headers, $secret);
        // unwrap successful if not error thrown, increment assertion count to avoid risky test warning
        $this->addToAssertionCount(1);
    }

    #[Test]
    public function testUnwrapWrongKey(): void
    {
        $this->expectException(WebhookException::class);

        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $secret = 'whsec_c2VjcmV0Cg==';
        $webhook = new Webhook($secret);
        $messageId = '1';
        $timestamp = time();
        $signature = $webhook->sign($messageId, $timestamp, $payload);

        /** @var array<string, list<string>> $headers */
        $headers = [
            'webhook-signature' => [$signature],
            'webhook-id' => [$messageId],
            'webhook-timestamp' => [(string) $timestamp],
        ];
        $wrongKey = 'whsec_aaaaaaaaaa';
        $this->client->webhooks->unwrap($payload, $headers, $wrongKey);
    }

    #[Test]
    public function testUnwrapBadSignature(): void
    {
        $this->expectException(WebhookException::class);

        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $secret = 'whsec_c2VjcmV0Cg==';
        $webhook = new Webhook($secret);
        $messageId = '1';
        $timestamp = time();
        $badSig = $webhook->sign($messageId, $timestamp, 'some other payload');

        /** @var array<string, list<string>> $headers */
        $headers = [
            'webhook-signature' => [$badSig],
            'webhook-id' => [$messageId],
            'webhook-timestamp' => [(string) $timestamp],
        ];
        $this->client->webhooks->unwrap($payload, $headers, $secret);
    }

    #[Test]
    public function testUnwrapOldTimestamp(): void
    {
        $this->expectException(WebhookException::class);

        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $secret = 'whsec_c2VjcmV0Cg==';
        $webhook = new Webhook($secret);
        $messageId = '1';
        $timestamp = time();
        $signature = $webhook->sign($messageId, $timestamp, $payload);

        /** @var array<string, list<string>> $headers */
        $headers = [
            'webhook-signature' => [$signature],
            'webhook-id' => [$messageId],
            'webhook-timestamp' => ['5'],
        ];
        $this->client->webhooks->unwrap($payload, $headers, $secret);
    }

    #[Test]
    public function testUnwrapWrongMessageID(): void
    {
        $this->expectException(WebhookException::class);

        $payload = '{"data":{"id":"0ccc7b54-4df3-4bca-a65a-3da1ecc777f0","event_type":"call.ai_gather.ended","occurred_at":"2018-02-02T22:25:27.521992Z","payload":{"call_control_id":"v2:T02llQxIyaRkhfRKxgAP8nY511EhFLizdvdUKJiSw8d6A9BborherQ","call_leg_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","call_session_id":"428c31b6-7af4-4bcb-b7f5-5013ef9657c1","client_state":"aGF2ZSBhIG5pY2UgZGF5ID1d","connection_id":"7267xxxxxxxxxxxxxx","from":"+35319605860","message_history":[{"content":"Hello, can you tell me your age and where you live?","role":"assistant"},{"content":"Hello, I\'m 29 and I live in Paris?","role":"user"}],"result":{"age":"bar","city":"bar"},"status":"valid","to":"+35319605860"},"record_type":"event"}}';
        $secret = 'whsec_c2VjcmV0Cg==';
        $webhook = new Webhook($secret);
        $messageId = '1';
        $timestamp = time();
        $signature = $webhook->sign($messageId, $timestamp, $payload);

        /** @var array<string, list<string>> $headers */
        $headers = [
            'webhook-signature' => [$signature],
            'webhook-id' => ['wrong'],
            'webhook-timestamp' => [(string) $timestamp],
        ];
        $this->client->webhooks->unwrap($payload, $headers, $secret);
    }
}
