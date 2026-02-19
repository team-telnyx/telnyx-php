<?php

namespace Tests\Services\Texml\Accounts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            accountSid: 'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            accountSid: 'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            accountSid: 'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            accountSid: 'account_sid',
            fallbackMethod: 'GET',
            fallbackURL: 'https://www.example.com/intruction-c.xml',
            method: 'GET',
            status: 'completed',
            statusCallback: 'https://www.example.com/callback',
            statusCallbackMethod: 'GET',
            texml: '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Hello</Say></Response>',
            url: 'https://www.example.com/intruction-b.xml',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallUpdateResponse::class, $result);
    }

    #[Test]
    public function testCalls(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            applicationSid: 'example-app-sid',
            from: '+13120001234',
            to: '+13121230000',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallCallsResponse::class, $result);
    }

    #[Test]
    public function testCallsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            applicationSid: 'example-app-sid',
            from: '+13120001234',
            to: '+13121230000',
            asyncAmd: true,
            asyncAmdStatusCallback: 'https://www.example.com/callback',
            asyncAmdStatusCallbackMethod: 'GET',
            callerID: 'Info',
            cancelPlaybackOnDetectMessageEnd: false,
            cancelPlaybackOnMachineDetection: false,
            customHeaders: [['name' => 'X-Custom-Header', 'value' => 'custom-value']],
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
            sendRecordingURL: false,
            sipAuthPassword: '1234',
            sipAuthUsername: 'user',
            sipRegion: 'Canada',
            statusCallback: 'https://www.example.com/statuscallback-listener',
            statusCallbackEvent: 'initiated',
            statusCallbackMethod: 'GET',
            superviseCallSid: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            supervisingRole: 'monitor',
            texml: '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Hello</Say></Response>',
            timeLimit: 3600,
            timeout: 60,
            trim: 'trim-silence',
            url: 'https://www.example.com/texml.xml',
            urlMethod: 'GET',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallCallsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveCalls(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->retrieveCalls(
            'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetCallsResponse::class, $result);
    }

    #[Test]
    public function testSiprecJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallSiprecJsonResponse::class, $result);
    }

    #[Test]
    public function testSiprecJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            accountSid: 'account_sid',
            connectorName: 'my_connector',
            includeMetadataCustomHeaders: true,
            name: 'my_siprec_session',
            secure: true,
            sessionTimeoutSecs: 900,
            sipTransport: 'tcp',
            statusCallback: 'https://www.example.com/callback',
            statusCallbackMethod: 'GET',
            track: 'both_tracks',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallSiprecJsonResponse::class, $result);
    }

    #[Test]
    public function testStreamsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallStreamsJsonResponse::class, $result);
    }

    #[Test]
    public function testStreamsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            accountSid: 'account_sid',
            bidirectionalCodec: 'G722',
            bidirectionalMode: 'rtp',
            name: 'My stream',
            statusCallback: 'http://webhook.com/callback',
            statusCallbackMethod: 'GET',
            track: 'both_tracks',
            url: 'wss://www.example.com/websocket',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallStreamsJsonResponse::class, $result);
    }
}
