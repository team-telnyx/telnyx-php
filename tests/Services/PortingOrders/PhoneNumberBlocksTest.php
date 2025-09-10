<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;

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
        $result = $this->client->portingOrders->phoneNumberBlocks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            activationRanges: [
                ActivationRange::with(
                    endAt: '+4930244999910',
                    startAt: '+4930244999901'
                ),
            ],
            phoneNumberRange: PhoneNumberRange::with(
                endAt: '+4930244999910',
                startAt: '+4930244999901'
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->phoneNumberBlocks->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            activationRanges: [
                ActivationRange::with(
                    endAt: '+4930244999910',
                    startAt: '+4930244999901'
                ),
            ],
            phoneNumberRange: PhoneNumberRange::with(
                endAt: '+4930244999910',
                startAt: '+4930244999901'
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->portingOrders->phoneNumberBlocks->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->phoneNumberBlocks->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
