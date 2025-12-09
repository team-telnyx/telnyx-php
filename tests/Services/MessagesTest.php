<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MessagesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetResponse::class, $result);
    }

    #[Test]
    public function testCancelScheduled(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->cancelScheduled(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageCancelScheduledResponse::class, $result);
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->schedule(['to' => '+18445550001']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageScheduleResponse::class, $result);
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->schedule([
            'to' => '+18445550001',
            'autoDetect' => true,
            'from' => '+18445550001',
            'mediaURLs' => ['string'],
            'messagingProfileID' => 'abc85f64-5717-4562-b3fc-2c9600000000',
            'sendAt' => new \DateTimeImmutable('2019-01-23T18:30:00Z'),
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'type' => 'SMS',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageScheduleResponse::class, $result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->send(['to' => '+18445550001']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->send([
            'to' => '+18445550001',
            'autoDetect' => true,
            'from' => '+18445550001',
            'mediaURLs' => ['http://example.com'],
            'messagingProfileID' => 'abc85f64-5717-4562-b3fc-2c9600000000',
            'sendAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'type' => 'MMS',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendGroupMms(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendGroupMms([
            'from' => '+13125551234', 'to' => ['+18655551234', '+14155551234'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendGroupMmsResponse::class, $result);
    }

    #[Test]
    public function testSendGroupMmsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendGroupMms([
            'from' => '+13125551234',
            'to' => ['+18655551234', '+14155551234'],
            'mediaURLs' => ['http://example.com'],
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendGroupMmsResponse::class, $result);
    }

    #[Test]
    public function testSendLongCode(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendLongCode([
            'from' => '+18445550001', 'to' => '+13125550002',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendLongCodeResponse::class, $result);
    }

    #[Test]
    public function testSendLongCodeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendLongCode([
            'from' => '+18445550001',
            'to' => '+13125550002',
            'autoDetect' => true,
            'mediaURLs' => ['http://example.com'],
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'type' => 'MMS',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendLongCodeResponse::class, $result);
    }

    #[Test]
    public function testSendNumberPool(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendNumberPool([
            'messagingProfileID' => 'abc85f64-5717-4562-b3fc-2c9600000000',
            'to' => '+13125550002',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendNumberPoolResponse::class, $result);
    }

    #[Test]
    public function testSendNumberPoolWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendNumberPool([
            'messagingProfileID' => 'abc85f64-5717-4562-b3fc-2c9600000000',
            'to' => '+13125550002',
            'autoDetect' => true,
            'mediaURLs' => ['http://example.com'],
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'type' => 'MMS',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendNumberPoolResponse::class, $result);
    }

    #[Test]
    public function testSendShortCode(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendShortCode([
            'from' => '+18445550001', 'to' => '+18445550001',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendShortCodeResponse::class, $result);
    }

    #[Test]
    public function testSendShortCodeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messages->sendShortCode([
            'from' => '+18445550001',
            'to' => '+18445550001',
            'autoDetect' => true,
            'mediaURLs' => ['http://example.com'],
            'subject' => 'From Telnyx!',
            'text' => 'Hello, World!',
            'type' => 'MMS',
            'useProfileWebhooks' => true,
            'webhookFailoverURL' => 'https://backup.example.com/hooks',
            'webhookURL' => 'http://example.com/webhooks',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendShortCodeResponse::class, $result);
    }
}
