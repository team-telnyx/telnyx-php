<?php

namespace Telnyx;

class MobileOperatorNetworkTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/mobile_operator_networks'
        );
        $resources = MobileOperatorNetwork::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\MobileOperatorNetwork::class, $resources['data'][0]);
    }
}
