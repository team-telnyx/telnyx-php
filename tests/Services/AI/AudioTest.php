<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AudioTest extends TestCase
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
    public function testTranscribe(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->audio->transcribe([
            'model' => 'distil-whisper/distil-large-v2',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AudioTranscribeResponse::class, $result);
    }

    #[Test]
    public function testTranscribeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->audio->transcribe([
            'model' => 'distil-whisper/distil-large-v2',
            'file' => file_get_contents(__FILE__) ?: '',
            'file_url' => 'https://example.com/file.mp3',
            'response_format' => 'json',
            'timestamp_granularities__' => 'segment',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AudioTranscribeResponse::class, $result);
    }
}
