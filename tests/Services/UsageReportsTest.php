<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultFlatPagination;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class UsageReportsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->usageReports->list(
            dimensions: ['string'],
            metrics: ['string'],
            product: 'product'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertIsArray($item);
        }
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->usageReports->list(
            dimensions: ['string'],
            metrics: ['string'],
            product: 'product',
            dateRange: 'date_range',
            endDate: 'end_date',
            filter: 'filter',
            format: 'csv',
            managedAccounts: true,
            pageNumber: 0,
            pageSize: 0,
            sort: ['string'],
            startDate: 'start_date',
            authorizationBearer: 'authorization_bearer',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertIsArray($item);
        }
    }

    #[Test]
    public function testGetOptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->usageReports->getOptions();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UsageReportGetOptionsResponse::class, $result);
    }
}
