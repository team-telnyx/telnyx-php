<?php

namespace Tests\Services\EmailInboxes\Messages;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testForward(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->forward(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            to: 'new@example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testForwardWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->forward(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            to: 'new@example.com',
            bcc: ['blind@example.com'],
            cc: [['email' => 'copy@example.com', 'name' => 'name']],
            html: 'html',
            text: 'FYI',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testReply(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->reply(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testReplyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->reply(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            html: 'P',
            text: 'Thanks for the update.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testReplyAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->replyAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }

    #[Test]
    public function testReplyAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->messages->actions->replyAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            html: 'P',
            text: 'Everyone, please review.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailMessageResponse::class, $result);
    }
}
