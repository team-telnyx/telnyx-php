<?php

namespace Tests\Services\EmailInboxes;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Messages\MessageListResponse;
use Telnyx\EmailInboxes\Messages\MessageUpdateResponse;
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            readAt: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            readAt: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageListResponse::class, $result);
    }

    #[Test]
    public function testDrafts(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->drafts(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailDraftResponse::class, $result);
    }

    #[Test]
    public function testDraftsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->drafts(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            attachments: [['foo' => 'bar']],
            bcc: ['string'],
            cc: ['string'],
            fromEmail: 'from_email',
            fromName: 'from_name',
            headers: ['foo' => 'string'],
            html: 'html',
            htmlBody: 'html_body',
            labels: ['string'],
            metadata: ['foo' => 'bar'],
            replyTo: 'reply_to',
            subject: 'subject',
            tags: ['string'],
            text: 'text',
            textBody: 'Thanks for the update — I will review today.',
            to: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailDraftResponse::class, $result);
    }
}
