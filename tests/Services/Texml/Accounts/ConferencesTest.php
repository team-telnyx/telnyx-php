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
final class ConferencesTest extends TestCase
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

        $result = $this->client->texml->accounts->conferences->retrieve(
            'conference_sid',
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

        $result = $this->client->texml->accounts->conferences->retrieve(
            'conference_sid',
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

        $result = $this->client->texml->accounts->conferences->update(
            'conference_sid',
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

        $result = $this->client->texml->accounts->conferences->update(
            'conference_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveConferences(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->retrieveConferences(
            'account_sid',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->retrieveRecordings(
            'conference_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->retrieveRecordings(
            'conference_sid',
            ['account_sid' => 'account_sid']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingsJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->retrieveRecordingsJson(
                'conference_sid',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingsJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->retrieveRecordingsJson(
                'conference_sid',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
