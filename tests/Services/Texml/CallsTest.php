<?php

namespace Tests\Services\Texml;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallsTest extends TestCase
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->calls->update('call_sid', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallUpdateResponse::class, $result);
    }

    #[Test]
    public function testInitiate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->calls->initiate(
            'application_id',
            ['From' => '+13120001234', 'To' => '+13121230000']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallInitiateResponse::class, $result);
    }

    #[Test]
    public function testInitiateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->calls->initiate(
            'application_id',
            [
                'From' => '+13120001234',
                'To' => '+13121230000',
                'AsyncAmd' => true,
                'AsyncAmdStatusCallback' => 'https://www.example.com/callback',
                'AsyncAmdStatusCallbackMethod' => 'GET',
                'CallerId' => 'Info',
                'CancelPlaybackOnDetectMessageEnd' => false,
                'CancelPlaybackOnMachineDetection' => false,
                'DetectionMode' => 'Premium',
                'FallbackUrl' => 'https://www.example.com/instructions-fallback.xml',
                'MachineDetection' => 'Enable',
                'MachineDetectionSilenceTimeout' => 2000,
                'MachineDetectionSpeechEndThreshold' => 2000,
                'MachineDetectionSpeechThreshold' => 2000,
                'MachineDetectionTimeout' => 5000,
                'PreferredCodecs' => 'PCMA,PCMU',
                'Record' => false,
                'RecordingChannels' => 'dual',
                'RecordingStatusCallback' => 'https://example.com/recording_status_callback',
                'RecordingStatusCallbackEvent' => 'in-progress completed absent',
                'RecordingStatusCallbackMethod' => 'GET',
                'RecordingTimeout' => 5,
                'RecordingTrack' => 'inbound',
                'SipAuthPassword' => '1234',
                'SipAuthUsername' => 'user',
                'StatusCallback' => 'https://www.example.com/statuscallback-listener',
                'StatusCallbackEvent' => 'initiated',
                'StatusCallbackMethod' => 'GET',
                'Trim' => 'trim-silence',
                'Url' => 'https://www.example.com/texml.xml',
                'UrlMethod' => 'GET',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallInitiateResponse::class, $result);
    }
}
