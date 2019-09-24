<?php

namespace Telnyx;


class MessagingShortCodeTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_short_codes'
        );
        $resources = MessagingShortCode::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\MessagingShortCode::class, $resources[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/messaging_short_codes/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = MessagingShortCode::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\MessagingShortCode::class, $resource);
    }

}
