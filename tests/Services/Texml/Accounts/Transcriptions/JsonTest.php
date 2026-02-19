<?php

namespace Tests\Services\Texml\Accounts\Transcriptions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testDeleteRecordingTranscriptionSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->deleteRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteRecordingTranscriptionSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->deleteRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveRecordingTranscriptionSidJson(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->retrieveRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            JsonGetRecordingTranscriptionSidJsonResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveRecordingTranscriptionSidJsonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->transcriptions
            ->json
            ->retrieveRecordingTranscriptionSidJson(
                '6a09cdc3-8948-47f0-aa62-74ac943d6c58',
                accountSid: 'account_sid'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            JsonGetRecordingTranscriptionSidJsonResponse::class,
            $result
        );
    }
}
