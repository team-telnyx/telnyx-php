<?php

namespace Tests\Services\Texml\Accounts\Transcriptions;

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
    public function testDeleteRecordingTranscriptionSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->deleteRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteRecordingTranscriptionSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->deleteRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingTranscriptionSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->retrieveRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveRecordingTranscriptionSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->retrieveRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                ['account_sid' => 'account_sid']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
