<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\TwoFactorProfile
 */
final class TwoFactorProfileTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '12ade33a-21c0-473b-b055-b3c836e1c292';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/2fa_profiles'
        );
        $resources = TwoFactorProfile::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\TwoFactorProfile::class, $resources['data'][0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/2fa_profiles'
        );
        $resource = TwoFactorProfile::create([
            "name" => "Test Profile",
            "default_timeout_secs" => 300
        ]);
        $this->assertInstanceOf(\Telnyx\TwoFactorProfile::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/2fa_profiles/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = TwoFactorProfile::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\TwoFactorProfile::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = TwoFactorProfile::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/2fa_profiles/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\TwoFactorProfile::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/2fa_profiles/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = TwoFactorProfile::update(self::TEST_RESOURCE_ID, [
            "name" => "Test Profile",
            "default_timeout_secs" => 300
        ]);
        $this->assertInstanceOf(\Telnyx\TwoFactorProfile::class, $resource);
    }
}
