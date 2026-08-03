<?php

namespace Tests\Services\EmailInboxes;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Filters\FilterAddResponse;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterReplaceResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FiltersTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterListResponse::class, $result);
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->add(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            entries: ['@spam.example'],
            type: 'blocklist',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->add(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            entries: ['@spam.example'],
            type: 'blocklist',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterAddResponse::class, $result);
    }

    #[Test]
    public function testDeleteAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->deleteAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            entries: ['former-partner@example.com'],
            type: 'allowlist',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterDeleteAllResponse::class, $result);
    }

    #[Test]
    public function testDeleteAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->deleteAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            entries: ['former-partner@example.com'],
            type: 'allowlist',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterDeleteAllResponse::class, $result);
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->filters->replace(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterReplaceResponse::class, $result);
    }
}
