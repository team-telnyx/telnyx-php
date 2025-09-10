<?php

namespace Tests\Services\Recordings;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testDelete(): void
    {
        $result = $this->client->recordings->actions->delete(
            [
                '428c31b6-7af4-4bcb-b7f5-5013ef9657c1',
                '428c31b6-7af4-4bcb-b7f5-5013ef9657c2',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->recordings->actions->delete(
            [
                '428c31b6-7af4-4bcb-b7f5-5013ef9657c1',
                '428c31b6-7af4-4bcb-b7f5-5013ef9657c2',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
