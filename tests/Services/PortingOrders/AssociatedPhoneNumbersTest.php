<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AssociatedPhoneNumbersTest extends TestCase
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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->associatedPhoneNumbers->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['action' => 'keep', 'phone_number_range' => []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociatedPhoneNumberNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->associatedPhoneNumbers->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'action' => 'keep',
                'phone_number_range' => [
                    'end_at' => '+441234567899', 'start_at' => '+441234567890',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociatedPhoneNumberNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->associatedPhoneNumbers->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->associatedPhoneNumbers->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AssociatedPhoneNumberDeleteResponse::class,
            $result
        );
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->associatedPhoneNumbers->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AssociatedPhoneNumberDeleteResponse::class,
            $result
        );
    }
}
