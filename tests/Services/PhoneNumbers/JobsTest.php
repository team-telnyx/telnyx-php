<?php

namespace Tests\Services\PhoneNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListResponse;
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
        $this->assertInstanceOf(JobListResponse::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->jobs->deleteBatch([
            'phoneNumbers' => ['+19705555098', '+19715555098', '32873127836'],
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
            'phoneNumbers' => ['+19705555098', '+19715555098', '32873127836'],
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
            'phoneNumbers' => ['1583466971586889004', '+13127367254'],
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
            'phoneNumbers' => ['1583466971586889004', '+13127367254'],
            'filter' => [
                'billingGroupID' => '62e4bf2e-c278-4282-b524-488d9c9c43b2',
                'connectionID' => '1521916448077776306',
                'customerReference' => 'customer_reference',
                'emergencyAddressID' => '9102160989215728032',
                'hasBundle' => 'has_bundle',
                'phoneNumber' => 'phone_number',
                'status' => 'active',
                'tag' => 'tag',
                'voiceConnectionName' => [
                    'contains' => 'test',
                    'endsWith' => 'test',
                    'eq' => 'test',
                    'startsWith' => 'test',
                ],
                'voiceUsagePaymentMethod' => 'channel',
            ],
            'billingGroupID' => 'dc8e4d67-33a0-4cbb-af74-7b58f05bd494',
            'connectionID' => 'dc8e4d67-33a0-4cbb-af74-7b58f05bd494',
            'customerReference' => 'customer-reference',
            'deletionLockEnabled' => true,
            'externalPin' => '123456',
            'hdVoiceEnabled' => true,
            'tags' => ['tag'],
            'voice' => [
                'callForwarding' => [
                    'callForwardingEnabled' => true,
                    'forwardingType' => 'always',
                    'forwardsTo' => '+13035559123',
                ],
                'callRecording' => [
                    'inboundCallRecordingChannels' => 'single',
                    'inboundCallRecordingEnabled' => true,
                    'inboundCallRecordingFormat' => 'wav',
                ],
                'callerIDNameEnabled' => true,
                'cnamListing' => [
                    'cnamListingDetails' => 'example', 'cnamListingEnabled' => true,
                ],
                'inboundCallScreening' => 'disabled',
                'mediaFeatures' => [
                    'acceptAnyRtpPacketsEnabled' => true,
                    'rtpAutoAdjustEnabled' => true,
                    't38FaxGatewayEnabled' => true,
                ],
                'techPrefixEnabled' => true,
                'translatedNumber' => '+13035559999',
                'usagePaymentMethod' => 'pay-per-minute',
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
            'emergencyEnabled' => true,
            'phoneNumbers' => ['+19705555098', '+19715555098', '32873127836'],
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
            'emergencyEnabled' => true,
            'phoneNumbers' => ['+19705555098', '+19715555098', '32873127836'],
            'emergencyAddressID' => '53829456729313',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            JobUpdateEmergencySettingsBatchResponse::class,
            $result
        );
    }
}
