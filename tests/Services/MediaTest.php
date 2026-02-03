<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Media\MediaGetResponse;
use Telnyx\Media\MediaListResponse;
use Telnyx\Media\MediaUpdateResponse;
use Telnyx\Media\MediaUploadResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MediaTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->retrieve('media_name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->update('media_name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->delete('media_name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDownload(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support application/octet-stream responses');
        }

        $result = $this->client->media->download('media_name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpload(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->upload(
            mediaURL: 'http://www.example.com/audio.mp3'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaUploadResponse::class, $result);
    }

    #[Test]
    public function testUploadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->media->upload(
            mediaURL: 'http://www.example.com/audio.mp3',
            mediaName: 'my-file',
            ttlSecs: 86400,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaUploadResponse::class, $result);
    }
}
