<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PhoneNumberExtensionsTest extends TestCase
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

        $result = $this->client->portingOrders->phoneNumberExtensions->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'activation_ranges' => [['end_at' => 10, 'start_at' => 1]],
                'extension_range' => ['end_at' => 10, 'start_at' => 1],
                'porting_phone_number_id' => 'f24151b6-3389-41d3-8747-7dd8c681e5e2',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberExtensionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberExtensions->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'activation_ranges' => [['end_at' => 10, 'start_at' => 1]],
                'extension_range' => ['end_at' => 10, 'start_at' => 1],
                'porting_phone_number_id' => 'f24151b6-3389-41d3-8747-7dd8c681e5e2',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberExtensionNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberExtensions->list(
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

        $result = $this->client->portingOrders->phoneNumberExtensions->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberExtensionDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberExtensions->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberExtensionDeleteResponse::class, $result);
    }
}
