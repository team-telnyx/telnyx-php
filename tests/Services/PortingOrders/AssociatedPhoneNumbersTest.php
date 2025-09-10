<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;

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
        $result = $this->client->portingOrders->associatedPhoneNumbers->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            action: 'keep',
            phoneNumberRange: (new PhoneNumberRange),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->associatedPhoneNumbers->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            action: 'keep',
            phoneNumberRange: (new PhoneNumberRange)
                ->withEndAt('+441234567899')
                ->withStartAt('+441234567890'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->portingOrders->associatedPhoneNumbers->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->portingOrders->associatedPhoneNumbers->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->associatedPhoneNumbers->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
