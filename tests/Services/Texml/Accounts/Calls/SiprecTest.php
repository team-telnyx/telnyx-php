<?php

namespace Tests\Services\Texml\Accounts\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SiprecTest extends TestCase
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
    public function testSiprecSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprec->siprecSidJson(
            'siprec_sid',
            accountSid: 'account_sid',
            callSid: 'call_sid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SiprecSiprecSidJsonResponse::class, $result);
    }

    #[Test]
    public function testSiprecSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprec->siprecSidJson(
            'siprec_sid',
            accountSid: 'account_sid',
            callSid: 'call_sid',
            status: 'stopped',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SiprecSiprecSidJsonResponse::class, $result);
    }
}
