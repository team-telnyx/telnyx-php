<?php

namespace Tests\Services\SimCardGroups;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction;
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->simCardGroups->actions->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(SimCardGroupAction::class, $item);
        }
    }

    #[Test]
    public function testRemovePrivateWirelessGateway(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->simCardGroups
            ->actions
            ->removePrivateWirelessGateway('6a09cdc3-8948-47f0-aa62-74ac943d6c58')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionRemovePrivateWirelessGatewayResponse::class,
            $result
        );
    }

    #[Test]
    public function testRemoveWirelessBlocklist(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->removeWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionRemoveWirelessBlocklistResponse::class,
            $result
        );
    }

    #[Test]
    public function testSetPrivateWirelessGateway(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            privateWirelessGatewayID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionSetPrivateWirelessGatewayResponse::class,
            $result
        );
    }

    #[Test]
    public function testSetPrivateWirelessGatewayWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setPrivateWirelessGateway(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            privateWirelessGatewayID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionSetPrivateWirelessGatewayResponse::class,
            $result
        );
    }

    #[Test]
    public function testSetWirelessBlocklist(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            wirelessBlocklistID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSetWirelessBlocklistResponse::class, $result);
    }

    #[Test]
    public function testSetWirelessBlocklistWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->simCardGroups->actions->setWirelessBlocklist(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            wirelessBlocklistID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionSetWirelessBlocklistResponse::class, $result);
    }
}
