<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Conference
 */
final class ConferenceTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '123';

    /*
    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/conferences'
        );
        $resources = Conference::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\Conference::class, $resources['data'][0]);
    }
    */

    /*
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/conferences'
        );
        $resource = Conference::create([
            "name" => "Business",
            "call_control_id" => "891510ac-f3e4-11e8-af5b-de00688a4931"
        ]);
        $this->assertInstanceOf(\Telnyx\Conference::class, $resource);
    }
    */

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = Conference::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\Conference::class, $resource);
    }

    /*
    public function testJoin()
    {
        $conference = Conference::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID) . '/actions/join'
        );
        $resource = $conference->join();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    
    public function testMute()
    {
        $conference = Conference::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID) . '/actions/mute'
        );
        $resource = $conference->mute();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    
    public function testUnute()
    {
        $conference = Conference::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID) . '/actions/unmute'
        );
        $resource = $conference->unmute();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    
    public function testHold()
    {
        $conference = Conference::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID) . '/actions/hold'
        );
        $resource = $conference->hold();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    
    public function testUnhold()
    {
        $conference = Conference::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v2/conferences/' . urlencode(self::TEST_RESOURCE_ID) . '/actions/unhold'
        );
        $resource = $conference->unhold();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    */

}
