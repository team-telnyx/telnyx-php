<?php

namespace Telnyx;

class PhoneNumberTest extends TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/phone_numbers'
        );
        $resources = PhoneNumber::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $resources['data'][0]);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/phone_numbers/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = PhoneNumber::update(self::TEST_RESOURCE_ID, [
            "name" => "Test",
        ]);
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/phone_numbers/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = PhoneNumber::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = PhoneNumber::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/phone_numbers/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $resource);
    }
}
