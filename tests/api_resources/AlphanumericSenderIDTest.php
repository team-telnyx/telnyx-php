<?php

namespace Telnyx;

class AlphanumericSenderIDTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';


    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/alphanumeric_sender_ids'
        );
        $resources = AlphanumericSenderID::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\AlphanumericSenderID::class, $resources[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/alphanumeric_sender_ids/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = AlphanumericSenderID::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\AlphanumericSenderID::class, $resource);
    }
}
