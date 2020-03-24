<?php

namespace Telnyx;

class MessageTest extends TestCase
{
    public function testCanCreateStandardMessage()
    {
        $this->expectsRequest(
            'post',
            '/v2/messages'
        );

        $resource = \Telnyx\Message::Create([
            "from" => "+13125550100",
            "to" => "+17735550100",
            "text" => "Hello!"
        ]);

        $this->assertInstanceOf(\Telnyx\Message::class, $resource);
    }
}
