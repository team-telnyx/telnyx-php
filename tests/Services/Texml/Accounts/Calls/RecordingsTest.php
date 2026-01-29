<?php

namespace Tests\Services\Texml\Accounts\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RecordingsTest extends TestCase
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
    public function testRecordingSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordings
            ->recordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid',
                callSid: 'call_sid',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingRecordingSidJsonResponse::class, $result);
    }

    #[Test]
    public function testRecordingSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordings
            ->recordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid',
                callSid: 'call_sid',
                status: 'paused',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingRecordingSidJsonResponse::class, $result);
    }
}
