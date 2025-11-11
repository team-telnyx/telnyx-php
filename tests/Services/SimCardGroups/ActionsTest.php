<?php

namespace Tests\Services\SimCardGroups;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRemovePrivateWirelessGateway(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->removeWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetPrivateWirelessGateway(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            ['private_wireless_gateway_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetPrivateWirelessGatewayWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            ['private_wireless_gateway_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetWirelessBlocklist(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            ['wireless_blocklist_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetWirelessBlocklistWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            ['wireless_blocklist_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
