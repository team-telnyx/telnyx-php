<?php

namespace Tests\Services\Rooms;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class SessionsTest extends TestCase
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
    public function testRetrieve(): void
    {
        $result = $this->client->rooms->sessions->retrieve(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList0(): void
    {
        $result = $this->client->rooms->sessions->list0();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList1(): void
    {
        $result = $this->client->rooms->sessions->list1(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveParticipants(): void
    {
        $result = $this->client->rooms->sessions->retrieveParticipants(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
