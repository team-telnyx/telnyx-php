<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\WhatsAppUser
 */
final class WhatsAppUserTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/whatsapp_users/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = WhatsAppUser::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\WhatsAppUser::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            "patch",
            "/v2/whatsapp_users/" . urlencode(self::TEST_RESOURCE_ID)
        );
        $result = WhatsAppUser::update(self::TEST_RESOURCE_ID, [
            "webhook_url" => "https://mywebhook.com/example/endpoint"
        ]);
        $this->assertInstanceOf(\Telnyx\WhatsAppUser::class, $result);
    }
}
