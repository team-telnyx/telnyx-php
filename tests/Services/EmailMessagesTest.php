<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailInboxes\Drafts\EmailMessage;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailMessages\EmailMessageBatchResponse;
use Telnyx\EmailMessages\EmailMessageGetResponse;
use Telnyx\EmailMessages\MessageEvent;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EmailMessagesTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->create(
            from: 'sender@example.com',
            to: ['recipient@example.com']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->create(
            from: 'sender@example.com',
            to: ['recipient@example.com'],
            attachments: [
                [
                    'content' => 'content',
                    'contentID' => 'content_id',
                    'contentType' => 'content_type',
                    'disposition' => 'disposition',
                    'filename' => 'filename',
                ],
            ],
            bcc: ['string'],
            cc: ['string'],
            forwardOfMessageID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            fromName: 'from_name',
            groupID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            headers: ['foo' => 'string'],
            htmlBody: 'html_body',
            ignoreSuppression: true,
            inReplyToMessageID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inlineCss: true,
            metadata: ['foo' => 'bar'],
            replyTo: 'string',
            replyToAll: true,
            sandboxMode: true,
            scheduledAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            sendAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            subject: 'Hello from Telnyx',
            tags: ['string'],
            templateID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            templateVariables: ['foo' => 'bar'],
            textBody: 'This is a test email.',
            trackingSettings: ['clickTracking' => true, 'openTracking' => true],
            idempotencyKey: '8e03978e-40d5-43e8-bc93-6894a57f9326',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->emailMessages->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailCursorPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(EmailMessage::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->batch(
            messages: [
                ['from' => 'sender@example.com', 'to' => ['recipient1@example.com']],
                ['from' => 'sender@example.com', 'to' => ['recipient2@example.com']],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageBatchResponse::class, $result);
    }

    #[Test]
    public function testBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->batch(
            messages: [
                [
                    'from' => 'sender@example.com',
                    'to' => ['recipient1@example.com'],
                    'attachments' => [
                        [
                            'content' => 'content',
                            'contentID' => 'content_id',
                            'contentType' => 'content_type',
                            'disposition' => 'disposition',
                            'filename' => 'filename',
                        ],
                    ],
                    'bcc' => ['string'],
                    'cc' => ['string'],
                    'fromName' => 'from_name',
                    'groupID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                    'headers' => ['foo' => 'string'],
                    'htmlBody' => 'html_body',
                    'ignoreSuppression' => true,
                    'inlineCss' => true,
                    'metadata' => ['foo' => 'bar'],
                    'replyTo' => 'string',
                    'sandboxMode' => true,
                    'scheduledAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'sendAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'subject' => 'Hello 1',
                    'tags' => ['string'],
                    'templateID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                    'templateVariables' => ['foo' => 'bar'],
                    'textBody' => 'Message 1',
                    'trackingSettings' => [
                        'clickTracking' => true, 'openTracking' => true,
                    ],
                ],
                [
                    'from' => 'sender@example.com',
                    'to' => ['recipient2@example.com'],
                    'attachments' => [
                        [
                            'content' => 'content',
                            'contentID' => 'content_id',
                            'contentType' => 'content_type',
                            'disposition' => 'disposition',
                            'filename' => 'filename',
                        ],
                    ],
                    'bcc' => ['string'],
                    'cc' => ['string'],
                    'fromName' => 'from_name',
                    'groupID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                    'headers' => ['foo' => 'string'],
                    'htmlBody' => 'html_body',
                    'ignoreSuppression' => true,
                    'inlineCss' => true,
                    'metadata' => ['foo' => 'bar'],
                    'replyTo' => 'string',
                    'sandboxMode' => true,
                    'scheduledAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'sendAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'subject' => 'Hello 2',
                    'tags' => ['string'],
                    'templateID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                    'templateVariables' => ['foo' => 'bar'],
                    'textBody' => 'Message 2',
                    'trackingSettings' => [
                        'clickTracking' => true, 'openTracking' => true,
                    ],
                ],
            ],
            sandboxMode: false,
            idempotencyKey: '8e03978e-40d5-43e8-bc93-6894a57f9326',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageBatchResponse::class, $result);
    }

    #[Test]
    public function testDeleteAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->deleteAll(
            address: 'dev@stainless.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->deleteAll(
            address: 'dev@stainless.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailMessages->deleteSchedule(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testRetrieveEvents(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->emailMessages->retrieveEvents(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailCursorPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MessageEvent::class, $item);
        }
    }
}
