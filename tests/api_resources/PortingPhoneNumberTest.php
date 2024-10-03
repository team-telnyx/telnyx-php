<?php

namespace Telnyx; 
use PHPUnit\Framework\Attributes\CoversClass;
 
#[CoversClass(\Telnyx\PortingPhoneNumber::class)]

final class PortingPhoneNumberTest extends \Telnyx\TestCase
{
    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/porting_phone_numbers'
        );
        $resources = PortingPhoneNumber::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        //$this->assertInstanceOf(\Telnyx\PortingPhoneNumber::class, $resources['data'][0]);
    }

}
