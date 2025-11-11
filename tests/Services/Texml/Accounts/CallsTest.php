<?php

namespace Tests\Services\Texml\Accounts;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->update(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSiprecJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->siprecJson(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStreamsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->calls->streamsJson(
            'call_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
