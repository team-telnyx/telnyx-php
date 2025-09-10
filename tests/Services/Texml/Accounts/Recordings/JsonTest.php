<?php

namespace Tests\Services\Texml\Accounts\Recordings;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class JsonTest extends TestCase
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
    public function testDeleteRecordingSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->recordings
            ->json
            ->deleteRecordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                'account_sid'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteRecordingSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->recordings
            ->json
            ->deleteRecordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                'account_sid'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->recordings
            ->json
            ->retrieveRecordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                'account_sid'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->recordings
            ->json
            ->retrieveRecordingSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                'account_sid'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
