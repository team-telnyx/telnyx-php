<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\WhatsAppContact
 */
final class WhatsAppContactTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testIsCheckable()
    {
        $this->expectsRequest(
            'post',
            '/v2/whatsapp_contacts'
        );
        $resources = WhatsAppContact::check([
            'contacts' => ['15125551234'],
            'whatsapp_user_id' => '15125551212'
        ]);
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\WhatsAppContact::class, $resources['data'][0]);
    }
}
