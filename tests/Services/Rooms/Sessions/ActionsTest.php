<?php

namespace Tests\Services\Rooms\Sessions;

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
    public function testEnd(): void
    {
        $result = $this->client->rooms->sessions->actions->end(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testKick(): void
    {
        $result = $this->client->rooms->sessions->actions->kick(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testMute(): void
    {
        $result = $this->client->rooms->sessions->actions->mute(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnmute(): void
    {
        $result = $this->client->rooms->sessions->actions->unmute(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
