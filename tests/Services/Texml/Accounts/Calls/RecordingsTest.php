<?php

namespace Tests\Services\Texml\Accounts\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordingSidJsonWithOptionalParams(): void
    {
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
