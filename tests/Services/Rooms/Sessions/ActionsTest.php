<?php

namespace Tests\Services\Rooms\Sessions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;
use Tests\UnsupportedMockTests;

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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testEnd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->rooms->sessions->actions->end(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionEndResponse::class, $result);
    }

    #[Test]
    public function testKick(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->rooms->sessions->actions->kick(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionKickResponse::class, $result);
    }

    #[Test]
    public function testMute(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->rooms->sessions->actions->mute(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionMuteResponse::class, $result);
    }

    #[Test]
    public function testUnmute(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->rooms->sessions->actions->unmute(
            '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionUnmuteResponse::class, $result);
    }
}
