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

        $result = $this->client->texml->calls->update('call_sid');

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
            from: '+13120001234',
            to: '+13121230000'
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
            from: '+13120001234',
            to: '+13121230000',
            asyncAmd: true,
            asyncAmdStatusCallback: 'https://www.example.com/callback',
            asyncAmdStatusCallbackMethod: 'GET',
            callerID: 'Info',
            cancelPlaybackOnDetectMessageEnd: false,
            cancelPlaybackOnMachineDetection: false,
            detectionMode: 'Premium',
            fallbackURL: 'https://www.example.com/instructions-fallback.xml',
            machineDetection: 'Enable',
            machineDetectionSilenceTimeout: 2000,
            machineDetectionSpeechEndThreshold: 2000,
            machineDetectionSpeechThreshold: 2000,
            machineDetectionTimeout: 5000,
            preferredCodecs: 'PCMA,PCMU',
            record: false,
            recordingChannels: 'dual',
            recordingStatusCallback: 'https://example.com/recording_status_callback',
            recordingStatusCallbackEvent: 'in-progress completed absent',
            recordingStatusCallbackMethod: 'GET',
            recordingTimeout: 5,
            recordingTrack: 'inbound',
            sipAuthPassword: '1234',
            sipAuthUsername: 'user',
            statusCallback: 'https://www.example.com/statuscallback-listener',
            statusCallbackEvent: 'initiated',
            statusCallbackMethod: 'GET',
            trim: 'trim-silence',
            url: 'https://www.example.com/texml.xml',
            urlMethod: 'GET',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallInitiateResponse::class, $result);
    }
}
