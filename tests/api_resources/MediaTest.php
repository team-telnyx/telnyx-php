<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Media
 */
final class MediaTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/media'
        );
        $resources = Media::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resources['data'][0]); // NOTE: No record_type for this object
    }

    public function testIsUploadableByURL()
    {
        $this->expectsRequest(
            'post',
            '/v2/media'
        );
        $resource = Media::upload([
            'media_name' => 'my_file',
            'media_url' => 'http://www.example.com/audio.mp3',
        ]);
        $this->assertInstanceOf(\Telnyx\Media::class, $resource);
    }

    public function testFileUploadWithFileHandle()
    {
        $this->expectsRequest(
            'post',
            '/v2/media',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $fp = \fopen(__DIR__ . '/../data/test.png', 'rb');

        $resource = Media::upload([
            'media_name' => 'my_file',
            'media' => $fp
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testFileUploadWithCURLFile()
    {
        $this->expectsRequest(
            'post',
            '/v2/media',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $curlFile = new \CURLFile(__DIR__ . '/../data/test.png');

        $resource = Media::upload([
            'media_name' => 'my_file',
            'media' => $curlFile
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }



    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/media/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = Media::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\Media::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            "patch",
            "/v2/media/" . urlencode(self::TEST_RESOURCE_ID)
        );
        $result = Media::update(self::TEST_RESOURCE_ID, [
            "application_name" => "call-router",
            "webhook_event_url" => "https://example.com"
        ]);
        $this->assertInstanceOf(\Telnyx\Media::class, $result);
    }

    public function testIsDeletable()
    {
        $resource = new Media(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/media/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\Media::class, $resource);
    }

    public function testIsDownloadable()
    {
        $this->expectsRequest(
            'get',
            '/v2/media/' . urlencode(self::TEST_RESOURCE_ID) . '/download'
        );
        $resource = Media::download(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\Media::class, $resource);
    }
}
