<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class TestsTest extends TestCase
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
        $result = $this->client->ai->assistants->tests->create(
            destination: 'x',
            instructions: 'x',
            name: 'x',
            rubric: [Rubric::with(criteria: 'criteria', name: 'name')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->ai->assistants->tests->create(
            destination: 'x',
            instructions: 'x',
            name: 'x',
            rubric: [Rubric::with(criteria: 'criteria', name: 'name')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->ai->assistants->tests->retrieve('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->ai->assistants->tests->update('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->ai->assistants->tests->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->ai->assistants->tests->delete('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
