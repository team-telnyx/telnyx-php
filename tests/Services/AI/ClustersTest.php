<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ClustersTest extends TestCase
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
        $result = $this->client->ai->clusters->retrieve('task_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->ai->clusters->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->ai->clusters->delete('task_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompute(): void
    {
        $result = $this->client->ai->clusters->compute(bucket: 'bucket');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testComputeWithOptionalParams(): void
    {
        $result = $this->client->ai->clusters->compute(bucket: 'bucket');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testFetchGraph(): void
    {
        $result = $this->client->ai->clusters->fetchGraph('task_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
