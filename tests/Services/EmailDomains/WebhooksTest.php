<?php

namespace Tests\Services\EmailDomains;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\Webhooks\EmailWebhook;
use Telnyx\EmailDomains\Webhooks\EmailWebhookEvent;
use Telnyx\EmailDomains\Webhooks\EmailWebhookResponse;
use Tests\UnsupportedMockTests;

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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            events: [
                EmailWebhookEvent::EMAIL_SENT,
                EmailWebhookEvent::EMAIL_DELIVERED,
                EmailWebhookEvent::EMAIL_BOUNCED,
            ],
            url: 'https://example.com/webhooks/email',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            events: [
                EmailWebhookEvent::EMAIL_SENT,
                EmailWebhookEvent::EMAIL_DELIVERED,
                EmailWebhookEvent::EMAIL_BOUNCED,
            ],
            url: 'https://example.com/webhooks/email',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            events: [
                EmailWebhookEvent::EMAIL_SENT,
                EmailWebhookEvent::EMAIL_DELIVERED,
                EmailWebhookEvent::EMAIL_OPENED,
            ],
            url: 'https://example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->emailDomains->webhooks->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(EmailWebhook::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailDomains->webhooks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            domainID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailWebhookResponse::class, $result);
    }
}
