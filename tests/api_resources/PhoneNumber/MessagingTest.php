<?php

namespace Telnyx\PhoneNumber;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\PhoneNumber\Messaging::class)]

final class MessagingTest extends \Telnyx\TestCase
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
