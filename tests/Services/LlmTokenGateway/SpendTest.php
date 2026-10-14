<?php

namespace Tests\Services\LlmTokenGateway;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SpendTest extends TestCase
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
    public function testRetrieveEvents(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->spend->retrieveEvents();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SpendGetEventsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveSummary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->spend->retrieveSummary(
            endDate: '2019-12-27',
            groupBy: 'token_group',
            startDate: '2019-12-27'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SpendGetSummaryResponse::class, $result);
    }

    #[Test]
    public function testRetrieveSummaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->spend->retrieveSummary(
            endDate: '2019-12-27',
            groupBy: 'token_group',
            startDate: '2019-12-27',
            endUserID: 'end_user_id',
            metadata: ['foo' => 'J!Q0Ok0bzJb7'],
            pageNumber: 1,
            pageSize: 1,
            pageSnapshot: 'page[snapshot]',
            tokenGroupID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            tokenKeyID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            tokenUserID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SpendGetSummaryResponse::class, $result);
    }
}
