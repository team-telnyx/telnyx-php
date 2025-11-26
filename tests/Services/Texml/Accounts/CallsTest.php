<?php

namespace Tests\Services\Texml\Accounts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            [
                'account_sid' => 'account_sid',
                'FallbackMethod' => 'GET',
                'FallbackUrl' => 'https://www.example.com/intruction-c.xml',
                'Method' => 'GET',
                'Status' => 'completed',
                'StatusCallback' => 'https://www.example.com/callback',
                'StatusCallbackMethod' => 'GET',
                'Texml' => '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Hello</Say></Response>',
                'Url' => 'https://www.example.com/intruction-b.xml',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallUpdateResponse::class, $result);
    }

    #[Test]
    public function testCalls(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            [
                'ApplicationSid' => 'ApplicationSid',
                'From' => '+13120001234',
                'To' => '+13121230000',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallCallsResponse::class, $result);
    }

    #[Test]
    public function testCallsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            [
                'ApplicationSid' => 'ApplicationSid',
                'From' => '+13120001234',
                'To' => '+13121230000',
                'AsyncAmd' => true,
                'AsyncAmdStatusCallback' => 'https://www.example.com/callback',
                'AsyncAmdStatusCallbackMethod' => 'GET',
                'CallerId' => 'Info',
                'CancelPlaybackOnDetectMessageEnd' => false,
                'CancelPlaybackOnMachineDetection' => false,
                'CustomHeaders' => [
                    ['name' => 'X-Custom-Header', 'value' => 'custom-value'],
                ],
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
                'SendRecordingUrl' => false,
                'SipAuthPassword' => '1234',
                'SipAuthUsername' => 'user',
                'SipRegion' => 'Canada',
                'StatusCallback' => 'https://www.example.com/statuscallback-listener',
                'StatusCallbackEvent' => 'initiated',
                'StatusCallbackMethod' => 'GET',
                'Trim' => 'trim-silence',
                'Url' => 'https://www.example.com/texml.xml',
                'UrlMethod' => 'GET',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallCallsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveCalls(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->retrieveCalls(
            'account_sid',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetCallsResponse::class, $result);
    }

    #[Test]
    public function testSiprecJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallSiprecJsonResponse::class, $result);
    }

    #[Test]
    public function testSiprecJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            [
                'account_sid' => 'account_sid',
                'ConnectorName' => 'my_connector',
                'IncludeMetadataCustomHeaders' => true,
                'Name' => 'my_siprec_session',
                'Secure' => true,
                'SessionTimeoutSecs' => 900,
                'SipTransport' => 'tcp',
                'StatusCallback' => 'https://www.example.com/callback',
                'StatusCallbackMethod' => 'GET',
                'Track' => 'both_tracks',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallSiprecJsonResponse::class, $result);
    }

    #[Test]
    public function testStreamsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallStreamsJsonResponse::class, $result);
    }

    #[Test]
    public function testStreamsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            [
                'account_sid' => 'account_sid',
                'BidirectionalCodec' => 'G722',
                'BidirectionalMode' => 'rtp',
                'Name' => 'My stream',
                'StatusCallback' => 'http://webhook.com/callback',
                'StatusCallbackMethod' => 'GET',
                'Track' => 'both_tracks',
                'Url' => 'wss://www.example.com/websocket',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallStreamsJsonResponse::class, $result);
    }
}
