<?php
namespace Telnyx; 

class AccessIpAddressTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/access_ip_address'
        );
        $resources = AccessIpAddress::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\AccessIpAddress::class, $resources['data'][0]);
    }

    // public function testIsCreatable()
    // {
    //     $this->expectsRequest(
    //         'post',
    //         '/v2/access_ip_address'
    //     );
    //     $resource = AccessIpAddress::create([
    //         "name" => "Test",
    //     ]);
    //     $this->assertInstanceOf(\Telnyx\AccessIpAddress::class, $resource);
    // }

    // public function testIsDeletable()
    // {
    //     $resource = AccessIpAddress::retrieve(self::TEST_RESOURCE_ID);
    //     $this->expectsRequest(
    //         'delete',
    //         '/v2/access_ip_address/' . urlencode(self::TEST_RESOURCE_ID)
    //     );
    //     $resource->delete();
    //     $this->assertInstanceOf(\Telnyx\AccessIpAddress::class, $resource);
    // }

    // public function testIsRetrievable()
    // {
    //     $this->expectsRequest(
    //         'get',
    //         '/v2/access_ip_address/' . urlencode(self::TEST_RESOURCE_ID)
    //     );
    //     $resource = AccessIpAddress::retrieve(self::TEST_RESOURCE_ID);
    //     $this->assertInstanceOf(\Telnyx\AccessIpAddress::class, $resource);
    // }
}