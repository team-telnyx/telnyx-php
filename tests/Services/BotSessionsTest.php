<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\BotSessions\BotSessionListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BotSessionsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->botSessions->list(
            email: 'agent-owner@example.com',
            portalRedirectToken: '01890a7e-e2f7-7c3d-8dbb-9a2c5f3d1e0b',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BotSessionListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->botSessions->list(
            email: 'agent-owner@example.com',
            portalRedirectToken: '01890a7e-e2f7-7c3d-8dbb-9a2c5f3d1e0b',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BotSessionListResponse::class, $result);
    }
}
