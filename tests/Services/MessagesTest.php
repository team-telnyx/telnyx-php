<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Telnyx\Messages\MessageSendWhatsappResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->schedule(to: '+18445550001');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageScheduleResponse::class, $result);
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->schedule(
            to: '+18445550001',
            autoDetect: true,
            from: '+18445550001',
            mediaURLs: ['string'],
            messagingProfileID: 'abc85f64-5717-4562-b3fc-2c9600000000',
            sendAt: new \DateTimeImmutable('2019-01-23T18:30:00Z'),
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            type: 'SMS',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageScheduleResponse::class, $result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->send(to: '+18445550001');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->send(
            to: '+18445550001',
            autoDetect: true,
            encoding: 'auto',
            from: '+18445550001',
            mediaURLs: ['http://example.com'],
            messagingProfileID: 'abc85f64-5717-4562-b3fc-2c9600000000',
            sendAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            type: 'MMS',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendGroupMms(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendGroupMms(
            from: '+13125551234',
            to: ['+18655551234', '+14155551234']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendGroupMmsResponse::class, $result);
    }

    #[Test]
    public function testSendGroupMmsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendGroupMms(
            from: '+13125551234',
            to: ['+18655551234', '+14155551234'],
            mediaURLs: ['http://example.com'],
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendGroupMmsResponse::class, $result);
    }

    #[Test]
    public function testSendLongCode(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendLongCode(
            from: '+18445550001',
            to: '+13125550002'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendLongCodeResponse::class, $result);
    }

    #[Test]
    public function testSendLongCodeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendLongCode(
            from: '+18445550001',
            to: '+13125550002',
            autoDetect: true,
            encoding: 'auto',
            mediaURLs: ['http://example.com'],
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            type: 'MMS',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendLongCodeResponse::class, $result);
    }

    #[Test]
    public function testSendNumberPool(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendNumberPool(
            messagingProfileID: 'abc85f64-5717-4562-b3fc-2c9600000000',
            to: '+13125550002',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendNumberPoolResponse::class, $result);
    }

    #[Test]
    public function testSendNumberPoolWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendNumberPool(
            messagingProfileID: 'abc85f64-5717-4562-b3fc-2c9600000000',
            to: '+13125550002',
            autoDetect: true,
            encoding: 'auto',
            mediaURLs: ['http://example.com'],
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            type: 'MMS',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendNumberPoolResponse::class, $result);
    }

    #[Test]
    public function testSendShortCode(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendShortCode(
            from: '+18445550001',
            to: '+18445550001'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendShortCodeResponse::class, $result);
    }

    #[Test]
    public function testSendShortCodeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendShortCode(
            from: '+18445550001',
            to: '+18445550001',
            autoDetect: true,
            encoding: 'auto',
            mediaURLs: ['http://example.com'],
            subject: 'From Telnyx!',
            text: 'Hello, World!',
            type: 'MMS',
            useProfileWebhooks: true,
            webhookFailoverURL: 'https://backup.example.com/hooks',
            webhookURL: 'http://example.com/webhooks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendShortCodeResponse::class, $result);
    }

    #[Test]
    public function testSendWhatsapp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendWhatsapp(
            from: '+13125551234',
            to: '+13125551234',
            whatsappMessage: []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendWhatsappResponse::class, $result);
    }

    #[Test]
    public function testSendWhatsappWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messages->sendWhatsapp(
            from: '+13125551234',
            to: '+13125551234',
            whatsappMessage: [
                'audio' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'bizOpaqueCallbackData' => 'biz_opaque_callback_data',
                'contacts' => [
                    [
                        'addresses' => [
                            [
                                'city' => 'city',
                                'country' => 'country',
                                'countryCode' => 'country_code',
                                'state' => 'state',
                                'street' => 'street',
                                'type' => 'type',
                                'zip' => 'zip',
                            ],
                        ],
                        'birthday' => 'birthday',
                        'emails' => [['email' => 'email', 'type' => 'type']],
                        'name' => 'name',
                        'org' => [
                            'company' => 'company',
                            'department' => 'department',
                            'title' => 'title',
                        ],
                        'phones' => [
                            ['phone' => 'phone', 'type' => 'type', 'waID' => 'wa_id'],
                        ],
                        'urls' => [['type' => 'type', 'url' => 'url']],
                    ],
                ],
                'document' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'image' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'interactive' => [
                    'action' => [
                        'button' => 'button',
                        'buttons' => [
                            ['reply' => ['id' => 'id', 'title' => 'title'], 'type' => 'reply'],
                        ],
                        'cards' => [
                            [
                                'action' => [
                                    'catalogID' => 'catalog_id',
                                    'productRetailerID' => 'product_retailer_id',
                                ],
                                'body' => ['text' => 'text'],
                                'cardIndex' => 0,
                                'header' => [
                                    'image' => [
                                        'caption' => 'caption',
                                        'filename' => 'filename',
                                        'link' => 'http://example.com/media.jpg',
                                        'voice' => true,
                                    ],
                                    'type' => 'image',
                                    'video' => [
                                        'caption' => 'caption',
                                        'filename' => 'filename',
                                        'link' => 'http://example.com/media.jpg',
                                        'voice' => true,
                                    ],
                                ],
                                'type' => 'cta_url',
                            ],
                        ],
                        'catalogID' => 'catalog_id',
                        'mode' => 'mode',
                        'name' => 'name',
                        'parameters' => ['displayText' => 'display_text', 'url' => 'url'],
                        'productRetailerID' => 'product_retailer_id',
                        'sections' => [
                            [
                                'productItems' => [
                                    ['productRetailerID' => 'product_retailer_id'],
                                ],
                                'rows' => [
                                    [
                                        'id' => 'id',
                                        'description' => 'description',
                                        'title' => 'title',
                                    ],
                                ],
                                'title' => 'title',
                            ],
                        ],
                    ],
                    'body' => ['text' => 'text'],
                    'footer' => ['text' => 'text'],
                    'header' => [
                        'document' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                        'image' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                        'subText' => 'sub_text',
                        'text' => 'text',
                        'video' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                    ],
                    'type' => 'cta_url',
                ],
                'location' => [
                    'address' => 'address',
                    'latitude' => 'latitude',
                    'longitude' => 'longitude',
                    'name' => 'name',
                ],
                'reaction' => ['emoji' => 'emoji', 'messageID' => 'message_id'],
                'sticker' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'type' => 'audio',
                'video' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
            ],
            type: 'WHATSAPP',
            webhookURL: 'webhook_url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendWhatsappResponse::class, $result);
    }
}
