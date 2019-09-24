<?php

namespace Telnyx;


class MessageTest extends TestCase
{
    const TEST_MESSAGING_PROFILE_ID = "d120432d-2e77-4583-87f8-1db837cee559";
    const TEST_SRC_LONG_CODE = "+13125550100";
    const TEST_SRC_ALPHANUMERIC = "Testing 123";
    const TEST_DST = "+17735550100";
    const TEST_MESSAGE_BODY = "Hello!";

    public function testCanCreateStandardMessage()
    {
        $this->expectsRequest(
            'post',
            '/v2/messages'
        );

        $resource = \Telnyx\Message::Create([
            "from" => static::TEST_SRC_LONG_CODE,
            "to" => static::TEST_DST,
            "text" => static::TEST_MESSAGE_BODY
        ]);

        $this->assertInstanceOf(\Telnyx\Message::class, $resource);
    }

    // Not implemented yet
    /*
    public function testCanCreateAlphanumericSenderIdMessage()
    {
        $this->expectsRequest(
            'post',
            '/v2/messages/alphanumeric_sender_id'
        );

        $resource = \Telnyx\Message::Create([
            "from" => TEST_SRC_LONG_CODE,
            "to" => TEST_DST,
            "text" => TEST_MESSAGE_BODY
        ]);
        
        $this->assertInstanceOf(\Telnyx\Message::class, $resource);
    }
    */

}
