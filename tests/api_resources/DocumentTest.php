<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Document
 */
final class DocumentTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/documents'
        );
        $resources = Document::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\Document::class, $resources['data'][0]);
    }

    public function testIsUploadableByURL()
    {
        $this->expectsRequest(
            'post',
            '/v2/documents'
        );
        $resource = Document::upload([
            'url' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
        ]);
        $this->assertInstanceOf(\Telnyx\Document::class, $resource);
    }

    public function testFileUploadWithFileHandle()
    {
        $this->expectsRequest(
            'post',
            '/v2/documents',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $fp = \fopen(__DIR__ . '/../data/test.png', 'rb');

        $resource = Document::upload([
            'file' => $fp
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testFileUploadWithCURLFile()
    {
        $this->expectsRequest(
            'post',
            '/v2/documents',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $curlFile = new \CURLFile(__DIR__ . '/../data/test.png');

        $resource = Document::upload([
            'file' => $curlFile
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }



    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/documents/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = Document::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\Document::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            "patch",
            "/v2/documents/" . urlencode(self::TEST_RESOURCE_ID)
        );
        $result = Document::update(self::TEST_RESOURCE_ID, [
            "application_name" => "call-router",
            "webhook_event_url" => "https://example.com"
        ]);
        $this->assertInstanceOf(\Telnyx\Document::class, $result);
    }

    public function testIsDeletable()
    {
        $resource = new Document(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/documents/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\Document::class, $resource);
    }

    public function testIsDownloadable()
    {
        $resource = new Document(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v2/documents/' . urlencode(self::TEST_RESOURCE_ID) . '/download'
        );
        $resource->download();
        $this->assertInstanceOf(\Telnyx\Document::class, $resource);
    }
}
