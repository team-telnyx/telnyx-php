<?php

namespace Tests\Services\AI\Assistants\Tests;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class RunsTest extends TestCase
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
        $result = $this->client->ai->assistants->tests->runs->retrieve(
            'run_id',
            'test_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->tests->runs->retrieve(
            'run_id',
            'test_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->ai->assistants->tests->runs->list('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTrigger(): void
    {
        $result = $this->client->ai->assistants->tests->runs->trigger('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
