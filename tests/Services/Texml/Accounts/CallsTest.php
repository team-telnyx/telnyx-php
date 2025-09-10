<?php

namespace Tests\Services\Texml\Accounts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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
        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->calls->retrieve(
            'call_sid',
            'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCalls(): void
    {
        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            applicationSid: 'ApplicationSid',
            from: '+13120001234',
            to: '+13121230000',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCallsWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->calls->calls(
            'account_sid',
            applicationSid: 'ApplicationSid',
            from: '+13120001234',
            to: '+13121230000',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveCalls(): void
    {
        $result = $this->client->texml->accounts->calls->retrieveCalls(
            'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSiprecJson(): void
    {
        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSiprecJsonWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStreamsJson(): void
    {
        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStreamsJsonWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            accountSid: 'account_sid'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
