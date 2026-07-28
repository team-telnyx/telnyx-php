<?php

namespace Tests\Services\EmailInboxes\Threads;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LabelsTest extends TestCase
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

        $result = $this->client->emailInboxes->threads->labels->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            labels: ['needs_review'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->threads->labels->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            labels: ['needs_review'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelNewResponse::class, $result);
    }

    #[Test]
    public function testDeleteAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->threads->labels->deleteAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            labels: ['needs_review'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelDeleteAllResponse::class, $result);
    }

    #[Test]
    public function testDeleteAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->emailInboxes->threads->labels->deleteAll(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            inboxID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            labels: ['needs_review'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelDeleteAllResponse::class, $result);
    }
}
