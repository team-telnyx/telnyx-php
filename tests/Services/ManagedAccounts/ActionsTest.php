<?php

namespace Tests\Services\ManagedAccounts;

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
    public function testDisable(): void
    {
        $result = $this->client->managedAccounts->actions->disable('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEnable(): void
    {
        $result = $this->client->managedAccounts->actions->enable('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
