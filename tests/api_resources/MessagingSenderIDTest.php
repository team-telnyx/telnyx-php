<?php

namespace Telnyx;


class MessagingSenderIDTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';


    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_sender_ids'
        );
        $resources = MessagingSenderID::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\MessagingSenderID::class, $resources[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_sender_ids/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = MessagingSenderID::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\MessagingSenderID::class, $resource);
    }

}
