<?php

namespace Tests\Services\Texml;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AccountsTest extends TestCase
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
    public function testRetrieveRecordingsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->retrieveRecordingsJson(
            'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AccountGetRecordingsJsonResponse::class, $result);
    }

    #[Test]
    public function testRetrieveTranscriptionsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->retrieveTranscriptionsJson(
            'account_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AccountGetTranscriptionsJsonResponse::class,
            $result
        );
    }
}
