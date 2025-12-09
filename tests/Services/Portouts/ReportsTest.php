<?php

namespace Tests\Services\Portouts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListResponse;
use Telnyx\Portouts\Reports\ReportNewResponse;
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

        $result = $this->client->portouts->reports->create([
            'params' => ['filters' => []], 'report_type' => 'export_portouts_csv',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->create([
            'params' => [
                'filters' => [
                    'created_at__gt' => new \DateTimeImmutable(
                        '2019-12-27T18:11:19.117Z'
                    ),
                    'created_at__lt' => new \DateTimeImmutable(
                        '2019-12-27T18:11:19.117Z'
                    ),
                    'customer_reference__in' => ['my-customer-reference'],
                    'end_user_name' => 'McPortersen',
                    'phone_numbers__overlaps' => ['+1234567890'],
                    'status__in' => ['pending'],
                ],
            ],
            'report_type' => 'export_portouts_csv',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportNewResponse::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portouts->reports->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportListResponse::class, $result);
    }
}
