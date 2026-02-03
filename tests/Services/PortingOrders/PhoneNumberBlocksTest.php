<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
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
            activationRanges: [
                ['endAt' => '+4930244999910', 'startAt' => '+4930244999901'],
            ],
            phoneNumberRange: [
                'endAt' => '+4930244999910', 'startAt' => '+4930244999901',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberBlockNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            activationRanges: [
                ['endAt' => '+4930244999910', 'startAt' => '+4930244999901'],
            ],
            phoneNumberRange: [
                'endAt' => '+4930244999910', 'startAt' => '+4930244999901',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberBlockNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->portingOrders->phoneNumberBlocks->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PortingPhoneNumberBlock::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            portingOrderID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberBlockDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            portingOrderID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberBlockDeleteResponse::class, $result);
    }
}
