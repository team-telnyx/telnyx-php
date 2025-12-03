<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Tests\UnsupportedMockTests;

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->create([
            'phone_number' => '+13035553000',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerServiceRecordNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->create([
            'phone_number' => '+13035553000',
            'additional_data' => [
                'account_number' => '123456789',
                'address_line_1' => '123 Main St',
                'authorized_person_name' => 'John Doe',
                'billing_phone_number' => '+12065551212',
                'city' => 'New York',
                'customer_code' => '123456789',
                'name' => 'Entity Inc.',
                'pin' => '1234',
                'state' => 'NY',
                'zip_code' => '10001',
            ],
            'webhook_url' => 'https://example.com/webhook',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerServiceRecordNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->retrieve(
            'customer_service_record_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerServiceRecordGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerServiceRecordListResponse::class, $result);
    }

    #[Test]
    public function testVerifyPhoneNumberCoverage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->verifyPhoneNumberCoverage([
            'phone_numbers' => ['+13035553000'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CustomerServiceRecordVerifyPhoneNumberCoverageResponse::class,
            $result
        );
    }

    #[Test]
    public function testVerifyPhoneNumberCoverageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->customerServiceRecords->verifyPhoneNumberCoverage([
            'phone_numbers' => ['+13035553000'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CustomerServiceRecordVerifyPhoneNumberCoverageResponse::class,
            $result
        );
    }
}
