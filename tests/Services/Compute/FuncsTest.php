<?php

namespace Tests\Services\Compute;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;
use Telnyx\Compute\Funcs\FuncGetRevisionsResponse;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FuncsTest extends TestCase
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
    public function testRetrieveLogs(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->compute->funcs->retrieveLogs('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testRetrieveMetricAggregates(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->compute->funcs->retrieveMetricAggregates(
            'id',
            endTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FuncGetMetricAggregatesResponse::class, $result);
    }

    #[Test]
    public function testRetrieveMetricAggregatesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->compute->funcs->retrieveMetricAggregates(
            'id',
            endTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            filterEdgeSite: 'filter[edge_site]',
            filterNamespace: 'filter[namespace]',
            pageNumber: 0,
            pageSize: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FuncGetMetricAggregatesResponse::class, $result);
    }

    #[Test]
    public function testRetrieveRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->compute->funcs->retrieveRevisions('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FuncGetRevisionsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveShipInspection(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->compute->funcs->retrieveShipInspection('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FuncGetShipInspectionResponse::class, $result);
    }
}
