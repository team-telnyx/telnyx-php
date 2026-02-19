<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PortingOrder;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PortingOrdersTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->create(
            phoneNumbers: ['+13035550000', '+13035550001', '+13035550002']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortingOrderNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->create(
            phoneNumbers: ['+13035550000', '+13035550001', '+13035550002'],
            customerGroupReference: 'Group-456',
            customerReference: 'Acct 123abc',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortingOrderNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortingOrderGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortingOrderUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->portingOrders->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PortingOrder::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveAllowedFocWindows(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->retrieveAllowedFocWindows(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PortingOrderGetAllowedFocWindowsResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveExceptionTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->retrieveExceptionTypes();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PortingOrderGetExceptionTypesResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveLoaTemplate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server doesn\'t support application/pdf responses');
        }

        $result = $this->client->portingOrders->retrieveLoaTemplate(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testRetrieveRequirements(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->portingOrders->retrieveRequirements(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(
                PortingOrderGetRequirementsResponse::class,
                $item
            );
        }
    }

    #[Test]
    public function testRetrieveSubRequest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->portingOrders->retrieveSubRequest(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortingOrderGetSubRequestResponse::class, $result);
    }
}
