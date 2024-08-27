<?php

namespace Telnyx\PhoneNumber;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\PhoneNumber\Voice::class)]

final class VoiceTest extends \Telnyx\TestCase
{

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/phone_numbers/voice'
        );
        $resources = Voice::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\PhoneNumber\Voice::class, $resources['data'][0]);
    }

}
