<?php

namespace Tests\Services\SimCardGroups;

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
    public function testRetrieve(): void
    {
        $result = $this->client->simCardGroups->actions->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->simCardGroups->actions->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRemovePrivateWirelessGateway(): void
    {
        $result = $this
            ->client
            ->simCardGroups
            ->actions
            ->removePrivateWirelessGateway('6a09cdc3-8948-47f0-aa62-74ac943d6c58')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRemoveWirelessBlocklist(): void
    {
        $result = $this->client->simCardGroups->actions->removeWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetPrivateWirelessGateway(): void
    {
        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetPrivateWirelessGatewayWithOptionalParams(): void
    {
        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetWirelessBlocklist(): void
    {
        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetWirelessBlocklistWithOptionalParams(): void
    {
        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
