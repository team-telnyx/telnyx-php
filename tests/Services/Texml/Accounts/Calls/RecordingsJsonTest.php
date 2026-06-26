<?php

namespace Tests\Services\Texml\Accounts\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RecordingsJsonTest extends TestCase
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
    public function testRecordingsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->recordingsJson('call_sid', accountSid: 'account_sid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            RecordingsJsonRecordingsJsonResponse::class,
            $result
        );
    }

    #[Test]
    public function testRecordingsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->recordingsJson(
                'call_sid',
                accountSid: 'account_sid',
                playBeep: false,
                recordingChannels: 'single',
                recordingStatusCallback: 'http://webhook.com/callback',
                recordingStatusCallbackEvent: 'in-progress completed absent',
                recordingStatusCallbackMethod: 'GET',
                recordingTrack: 'inbound',
                sendRecordingURL: false,
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            RecordingsJsonRecordingsJsonResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveRecordingsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->retrieveRecordingsJson('call_sid', accountSid: 'account_sid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            RecordingsJsonGetRecordingsJsonResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveRecordingsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->retrieveRecordingsJson('call_sid', accountSid: 'account_sid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            RecordingsJsonGetRecordingsJsonResponse::class,
            $result
        );
    }
}
