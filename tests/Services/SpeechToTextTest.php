<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SpeechToTextTest extends TestCase
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
    public function testListProviders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->speechToText->listProviders();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SpeechToTextListProvidersResponse::class, $result);
    }

    #[Test]
    public function testRetrieveTranscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->speechToText->retrieveTranscription(
            inputFormat: 'mp3',
            transcriptionEngine: 'Azure'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveTranscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->speechToText->retrieveTranscription(
            inputFormat: 'mp3',
            transcriptionEngine: 'Azure',
            endpointing: 0,
            interimResults: true,
            keyterm: 'keyterm',
            keywords: 'keywords',
            language: 'language',
            model: 'fast',
            redact: 'redact',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
