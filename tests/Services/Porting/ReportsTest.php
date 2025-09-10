<?php

namespace Tests\Services\Porting;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters;

/**
 * @internal
 */
#[CoversNothing]
final class ReportsTest extends TestCase
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
    public function testCreate(): void
    {
        $result = $this->client->porting->reports->create(
            params: ExportPortingOrdersCsvReport::with(filters: (new Filters)),
            reportType: 'export_porting_orders_csv',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->porting->reports->create(
            params: ExportPortingOrdersCsvReport::with(
                filters: (new Filters)
                    ->withCreatedAtGt(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withCreatedAtLt(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withCustomerReferenceIn(['my-customer-reference'])
                    ->withStatusIn(['draft']),
            ),
            reportType: 'export_porting_orders_csv',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->porting->reports->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->porting->reports->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
