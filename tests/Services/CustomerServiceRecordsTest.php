<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class CustomerServiceRecordsTest extends TestCase
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
        $result = $this->client->customerServiceRecords->create(
            phoneNumber: '+1234567890'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->customerServiceRecords->create(
            phoneNumber: '+1234567890'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->customerServiceRecords->retrieve(
            'customer_service_record_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->customerServiceRecords->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testVerifyPhoneNumberCoverage(): void
    {
        $result = $this->client->customerServiceRecords->verifyPhoneNumberCoverage(
            ['+1234567890']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testVerifyPhoneNumberCoverageWithOptionalParams(): void
    {
        $result = $this->client->customerServiceRecords->verifyPhoneNumberCoverage(
            ['+1234567890']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
