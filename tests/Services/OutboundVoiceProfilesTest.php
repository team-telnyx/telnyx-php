<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class OutboundVoiceProfilesTest extends TestCase
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

        $result = $this->client->outboundVoiceProfiles->create([
            'name' => 'office',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->create([
            'name' => 'office',
            'billing_group_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            'call_recording' => [
                'call_recording_caller_phone_numbers' => ['+19705555098'],
                'call_recording_channels' => 'dual',
                'call_recording_format' => 'mp3',
                'call_recording_type' => 'by_caller_phone_number',
            ],
            'calling_window' => [
                'calls_per_cld' => 5,
                'end_time' => '18:11:19.117Z',
                'start_time' => '18:11:19.117Z',
            ],
            'concurrent_call_limit' => 10,
            'daily_spend_limit' => '100.00',
            'daily_spend_limit_enabled' => true,
            'enabled' => true,
            'max_destination_rate' => 10,
            'service_plan' => 'global',
            'tags' => ['office-profile'],
            'traffic_type' => 'conversational',
            'usage_payment_method' => 'rate-deck',
            'whitelisted_destinations' => ['US', 'BR', 'AU'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->retrieve(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->update(
            '1293384261075731499',
            ['name' => 'office']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->update(
            '1293384261075731499',
            [
                'name' => 'office',
                'billing_group_id' => '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                'call_recording' => [
                    'call_recording_caller_phone_numbers' => ['+19705555098'],
                    'call_recording_channels' => 'dual',
                    'call_recording_format' => 'mp3',
                    'call_recording_type' => 'by_caller_phone_number',
                ],
                'calling_window' => [
                    'calls_per_cld' => 5,
                    'end_time' => '18:11:19.117Z',
                    'start_time' => '18:11:19.117Z',
                ],
                'concurrent_call_limit' => 10,
                'daily_spend_limit' => '100.00',
                'daily_spend_limit_enabled' => true,
                'enabled' => true,
                'max_destination_rate' => 10,
                'service_plan' => 'global',
                'tags' => ['office-profile'],
                'traffic_type' => 'conversational',
                'usage_payment_method' => 'rate-deck',
                'whitelisted_destinations' => ['US', 'BR', 'AU'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->delete(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileDeleteResponse::class, $result);
    }
}
