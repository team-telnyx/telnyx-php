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
final class RecordingsJsonTest extends TestCase
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
    public function testRecordingsJson(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->recordingsJson('call_sid', accountSid: 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRecordingsJsonWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->recordingsJson('call_sid', accountSid: 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingsJson(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->retrieveRecordingsJson('call_sid', 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingsJsonWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->calls
            ->recordingsJson
            ->retrieveRecordingsJson('call_sid', 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
