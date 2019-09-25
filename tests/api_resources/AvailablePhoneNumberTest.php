<?php

namespace Telnyx;

class TestAvailablePhoneNumber extends TestCase
{
    const TEST_RESOURCE_ID = '+18005554000';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/available_phone_numbers'
        );
        $resources = AvailablePhoneNumber::all([
            'filter' => [
                "limit" => 1,
                "features" => ["sms", "mms"],
                "phone_number" => ["contains" => "555"],
            ]
        ]);
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\AvailablePhoneNumber::class, $resources[0]);
    }
}
