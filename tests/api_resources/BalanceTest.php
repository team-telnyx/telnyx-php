<?php

namespace Telnyx;

class BalanceTest extends TestCase
{
    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/balance'
        );
        $resource = Balance::retrieve();
        $this->assertInstanceOf(\Telnyx\Balance::class, $resource);
    }
}
