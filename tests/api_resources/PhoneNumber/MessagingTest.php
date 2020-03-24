<?php

namespace Telnyx\PhoneNumber;

class MessagingTest extends \Telnyx\TestCase
{

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/phone_numbers/messaging'
        );
        $resources = Messaging::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\PhoneNumber\Messaging::class, $resources['data'][0]);
    }

}
