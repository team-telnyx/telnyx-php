<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PhoneNumberBlocksTest extends TestCase
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

        $result = $this->client->portingOrders->phoneNumberBlocks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'activation_ranges' => [
                    ['end_at' => '+4930244999910', 'start_at' => '+4930244999901'],
                ],
                'phone_number_range' => [
                    'end_at' => '+4930244999910', 'start_at' => '+4930244999901',
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'activation_ranges' => [
                    ['end_at' => '+4930244999910', 'start_at' => '+4930244999901'],
                ],
                'phone_number_range' => [
                    'end_at' => '+4930244999910', 'start_at' => '+4930244999901',
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['porting_order_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
