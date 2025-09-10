<?php

namespace Tests\Services\Portouts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters;
use Tests\UnsupportedMockTests;

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->create(
            params: ExportPortoutsCsvReport::with(filters: (new Filters)),
            reportType: 'export_portouts_csv',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->create(
            params: ExportPortoutsCsvReport::with(
                filters: (new Filters)
                    ->withCreatedAtGt(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withCreatedAtLt(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withCustomerReferenceIn(['my-customer-reference'])
                    ->withEndUserName('McPortersen')
                    ->withPhoneNumbersOverlaps(['+1234567890'])
                    ->withStatusIn(['pending']),
            ),
            reportType: 'export_portouts_csv',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
