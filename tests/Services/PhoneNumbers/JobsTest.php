<?php

namespace Tests\Services\PhoneNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class JobsTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->deleteBatch([
            'phone_numbers' => ['+19705555098', '+19715555098', '32873127836'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobDeleteBatchResponse::class, $result);
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->deleteBatch([
            'phone_numbers' => ['+19705555098', '+19715555098', '32873127836'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobDeleteBatchResponse::class, $result);
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->updateBatch([
            'phone_numbers' => ['1583466971586889004', '+13127367254'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobUpdateBatchResponse::class, $result);
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->updateBatch([
            'phone_numbers' => ['1583466971586889004', '+13127367254'],
            'filter' => [
                'billing_group_id' => '62e4bf2e-c278-4282-b524-488d9c9c43b2',
                'connection_id' => '1521916448077776306',
                'customer_reference' => 'customer_reference',
                'emergency_address_id' => '9102160989215728032',
                'has_bundle' => 'has_bundle',
                'phone_number' => 'phone_number',
                'status' => 'active',
                'tag' => 'tag',
                'voice.connection_name' => [
                    'contains' => 'test',
                    'ends_with' => 'test',
                    'eq' => 'test',
                    'starts_with' => 'test',
                ],
                'voice.usage_payment_method' => 'channel',
            ],
            'billing_group_id' => 'dc8e4d67-33a0-4cbb-af74-7b58f05bd494',
            'connection_id' => 'dc8e4d67-33a0-4cbb-af74-7b58f05bd494',
            'customer_reference' => 'customer-reference',
            'deletion_lock_enabled' => true,
            'external_pin' => '123456',
            'hd_voice_enabled' => true,
            'tags' => ['tag'],
            'voice' => [
                'call_forwarding' => [
                    'call_forwarding_enabled' => true,
                    'forwarding_type' => 'always',
                    'forwards_to' => '+13035559123',
                ],
                'call_recording' => [
                    'inbound_call_recording_channels' => 'single',
                    'inbound_call_recording_enabled' => true,
                    'inbound_call_recording_format' => 'wav',
                ],
                'caller_id_name_enabled' => true,
                'cnam_listing' => [
                    'cnam_listing_details' => 'example', 'cnam_listing_enabled' => true,
                ],
                'inbound_call_screening' => 'disabled',
                'media_features' => [
                    'accept_any_rtp_packets_enabled' => true,
                    'rtp_auto_adjust_enabled' => true,
                    't38_fax_gateway_enabled' => true,
                ],
                'tech_prefix_enabled' => true,
                'translated_number' => '+13035559999',
                'usage_payment_method' => 'pay-per-minute',
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobUpdateBatchResponse::class, $result);
    }

    #[Test]
    public function testUpdateEmergencySettingsBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->updateEmergencySettingsBatch([
            'emergency_enabled' => true,
            'phone_numbers' => ['+19705555098', '+19715555098', '32873127836'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            JobUpdateEmergencySettingsBatchResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateEmergencySettingsBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->updateEmergencySettingsBatch([
            'emergency_enabled' => true,
            'phone_numbers' => ['+19705555098', '+19715555098', '32873127836'],
            'emergency_address_id' => '53829456729313',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            JobUpdateEmergencySettingsBatchResponse::class,
            $result
        );
    }
}
