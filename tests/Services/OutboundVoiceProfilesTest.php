<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
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

        $result = $this->client->outboundVoiceProfiles->create(name: 'office');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OutboundVoiceProfileNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->outboundVoiceProfiles->create(
            name: 'office',
            billingGroupID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            callRecording: [
                'callRecordingCallerPhoneNumbers' => ['+19705555098'],
                'callRecordingChannels' => 'dual',
                'callRecordingFormat' => 'mp3',
                'callRecordingType' => 'by_caller_phone_number',
            ],
            callingWindow: [
                'callsPerCld' => 5,
                'endTime' => '18:11:19.117Z',
                'startTime' => '18:11:19.117Z',
            ],
            concurrentCallLimit: 10,
            dailySpendLimit: '100.00',
            dailySpendLimitEnabled: true,
            enabled: true,
            maxDestinationRate: 10,
            servicePlan: ServicePlan::GLOBAL,
            tags: ['office-profile'],
            trafficType: TrafficType::CONVERSATIONAL,
            usagePaymentMethod: UsagePaymentMethod::RATE_DECK,
            whitelistedDestinations: ['US', 'BR', 'AU'],
        );

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
            name: 'office'
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
            name: 'office',
            billingGroupID: '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
            callRecording: [
                'callRecordingCallerPhoneNumbers' => ['+19705555098'],
                'callRecordingChannels' => 'dual',
                'callRecordingFormat' => 'mp3',
                'callRecordingType' => 'by_caller_phone_number',
            ],
            callingWindow: [
                'callsPerCld' => 5,
                'endTime' => '18:11:19.117Z',
                'startTime' => '18:11:19.117Z',
            ],
            concurrentCallLimit: 10,
            dailySpendLimit: '100.00',
            dailySpendLimitEnabled: true,
            enabled: true,
            maxDestinationRate: 10,
            servicePlan: ServicePlan::GLOBAL,
            tags: ['office-profile'],
            trafficType: TrafficType::CONVERSATIONAL,
            usagePaymentMethod: UsagePaymentMethod::RATE_DECK,
            whitelistedDestinations: ['US', 'BR', 'AU'],
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

        $page = $this->client->outboundVoiceProfiles->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(OutboundVoiceProfile::class, $item);
        }
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
