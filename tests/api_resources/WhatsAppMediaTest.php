<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\WhatsAppMedia
 */
final class WhatsAppMediaTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';
    const WHATSAPP_USER_ID = '15125551212';
    const WHATSAPP_MEDIA_ID = '1234';

    // NOTE: Currently the API doesn't allow upload via URL like with /v2/documents

    public function testFileUploadWithFileHandle()
    {
        $this->expectsRequest(
            'post',
            '/v2/whatsapp_media',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $fp = \fopen(__DIR__ . '/../data/test.png', 'rb');

        $resource = WhatsAppMedia::upload([
            'media_content_type' => 'image/jpeg',
            'upload_file' => $fp,
            'whatsapp_user_id' => self::WHATSAPP_USER_ID
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testFileUploadWithCURLFile()
    {
        $this->expectsRequest(
            'post',
            '/v2/whatsapp_media',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );

        $curlFile = new \CURLFile(__DIR__ . '/../data/test.png');

        $resource = WhatsAppMedia::upload([
            'media_content_type' => 'image/jpeg',
            'upload_file' => $curlFile,
            'whatsapp_user_id' => self::WHATSAPP_USER_ID
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }


    public function testIsDownloadable()
    {
        $this->expectsRequest(
            'get',
            '/v2/whatsapp_media/' . urlencode(self::WHATSAPP_USER_ID) . '/' . urlencode(self::WHATSAPP_MEDIA_ID) . '/download'
        );
        WhatsAppMedia::download(self::WHATSAPP_USER_ID, self::WHATSAPP_MEDIA_ID);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testIsDeletable()
    {
        $this->expectsRequest(
            'delete',
            '/v2/whatsapp_media/' . urlencode(self::WHATSAPP_USER_ID) . '/' . urlencode(self::WHATSAPP_MEDIA_ID)
        );
        WhatsAppMedia::delete(self::WHATSAPP_USER_ID, self::WHATSAPP_MEDIA_ID);
        $this->assertInstanceOf(\Telnyx\WhatsAppMedia::class, $resource);
    }
}
