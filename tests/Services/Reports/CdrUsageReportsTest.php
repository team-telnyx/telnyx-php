<?php

namespace Tests\Services\Reports;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CdrUsageReportsTest extends TestCase
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
    public function testFetchSync(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->reports->cdrUsageReports->fetchSync([
            'aggregationType' => 'NO_AGGREGATION',
            'productBreakdown' => 'NO_BREAKDOWN',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CdrUsageReportFetchSyncResponse::class, $result);
    }

    #[Test]
    public function testFetchSyncWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->reports->cdrUsageReports->fetchSync([
            'aggregationType' => 'NO_AGGREGATION',
            'productBreakdown' => 'NO_BREAKDOWN',
            'connections' => [1234567890123],
            'endDate' => new \DateTimeImmutable('2020-07-01T00:00:00-06:00'),
            'startDate' => new \DateTimeImmutable('2020-07-01T00:00:00-06:00'),
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CdrUsageReportFetchSyncResponse::class, $result);
    }
}
