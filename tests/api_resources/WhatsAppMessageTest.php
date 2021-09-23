<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\WhatsAppMessage
 */
final class WhatsAppMessageTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testSend()
    {
        $this->expectsRequest(
            'post',
            '/v2/whatsapp_messages'
        );
        $resource = WhatsAppMessage::send([
            'to' => '15125551234',
            'whatsapp_user_id' => '15125551212',
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource); // Returns a WhatsAppMessageId object, not WhatsAppMessage.
    }

    public function testMarkRead()
    {
        $this->expectsRequest(
            "patch",
            "/v2/whatsapp_messages/" . urlencode(self::TEST_RESOURCE_ID)
        );
        $result = WhatsAppMessage::mark_read(self::TEST_RESOURCE_ID, [
            "status" => "read",
            "whatsapp_user_id" => "15125551212"
        ]);
        $this->assertInstanceOf(\Telnyx\WhatsAppMessage::class, $result);
    }
}
