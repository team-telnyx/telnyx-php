<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\WebhookDelivery
 */
final class WebhookDeliveryTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = 'C9C0797E-901D-4349-A33C-C2C8F31A92C2';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/webhook_deliveries'
        );
        $resources = WebhookDelivery::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\WebhookDelivery::class, $resources['data'][0]);
    }
    
    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/webhook_deliveries/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = WebhookDelivery::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\WebhookDelivery::class, $resource);
    }
}
