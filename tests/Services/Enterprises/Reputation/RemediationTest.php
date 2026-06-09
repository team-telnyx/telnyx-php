<?php

namespace Tests\Services\Enterprises\Reputation;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationGetResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RemediationTest extends TestCase
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

        $result = $this->client->enterprises->reputation->remediation->create(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            callPurpose: 'Appointment reminders for our dental clinic.',
            phoneNumbers: ['+19493253498', '+12134445566'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RemediationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->remediation->create(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            callPurpose: 'Appointment reminders for our dental clinic.',
            phoneNumbers: ['+19493253498', '+12134445566'],
            contactEmail: 'ops@example.com',
            webhookURL: 'https://example.com/webhooks/remediation',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RemediationNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->remediation->retrieve(
            'b7c1f1c0-7a9d-4f0a-9d3e-2f6a1c4b8e21',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RemediationGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->remediation->retrieve(
            'b7c1f1c0-7a9d-4f0a-9d3e-2f6a1c4b8e21',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RemediationGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->enterprises->reputation->remediation->list(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(RemediationListResponse::class, $item);
        }
    }
}
