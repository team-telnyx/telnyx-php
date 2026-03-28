<?php

namespace Tests\Services\Enterprises\Reputation;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberNewResponse;
use Telnyx\ReputationPhoneNumberWithReputationData;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NumbersTest extends TestCase
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

        $result = $this->client->enterprises->reputation->numbers->create(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            phoneNumbers: ['+16035551234']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->create(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            phoneNumbers: ['+16035551234']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->retrieve(
            '+16035551234',
            enterpriseID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->retrieve(
            '+16035551234',
            enterpriseID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            fresh: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->enterprises->reputation->numbers->list(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(
                ReputationPhoneNumberWithReputationData::class,
                $item
            );
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->delete(
            '+16035551234',
            enterpriseID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->delete(
            '+16035551234',
            enterpriseID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
