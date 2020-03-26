<?php

namespace Telnyx;

class MessagingPhoneNumberTest extends TestCase
{
    const TEST_RESOURCE_ID = '+18005554000';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_phone_numbers'
        );
        $resources = MessagingPhoneNumber::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\MessagingPhoneNumber::class, $resources['data'][0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_phone_numbers/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = MessagingPhoneNumber::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\MessagingPhoneNumber::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/messaging_phone_numbers/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = MessagingPhoneNumber::update(self::TEST_RESOURCE_ID, [
            "name" => "value",
        ]);
        $this->assertInstanceOf(\Telnyx\MessagingPhoneNumber::class, $resource);
    }
}
