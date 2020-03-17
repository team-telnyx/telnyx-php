<?php

namespace Telnyx;

class InboundChannelTest extends TestCase
{

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/phone_numbers/inbound_channels'
        );
        $resource = InboundChannel::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\InboundChannel::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/phone_numbers/inbound_channels'
        );
        $resource = InboundChannel::update(self::TEST_RESOURCE_ID, [
            "channels" => 10,
        ]);
        $this->assertInstanceOf(\Telnyx\InboundChannel::class, $resource);
    }

}
