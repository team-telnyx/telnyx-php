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
        $resource = InboundChannel::retrieve();
        $this->assertInstanceOf(\Telnyx\InboundChannel::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/phone_numbers/inbound_channels'
        );
        $resource = InboundChannel::update([
            "channels" => 10,
        ]);
        $this->assertInstanceOf(\Telnyx\InboundChannel::class, $resource);
    }
}
