<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\TelephonyCredential
 */
final class TelephonyCredentialTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = 'c215ade3-0d39-418e-94be-c5f780760199';
    
    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/telephony_credentials'
        );
        $resources = TelephonyCredential::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\TelephonyCredential::class, $resources['data'][0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/telephony_credentials'
        );
        $resource = TelephonyCredential::create(["connection_id" => "1234567890", "name" => "My-new-credential"]);
        $this->assertInstanceOf(\Telnyx\TelephonyCredential::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/telephony_credentials/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = TelephonyCredential::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\TelephonyCredential::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/telephony_credentials/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = TelephonyCredential::update(self::TEST_RESOURCE_ID, ["connection_id" => "987654321", "name" => "My-new-updated-credential"]);
        $this->assertInstanceOf(\Telnyx\TelephonyCredential::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = TelephonyCredential::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/telephony_credentials/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\TelephonyCredential::class, $resource);
    }

    public function testToken()
    {
        $resource = TelephonyCredential::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v2/telephony_credentials/' . urlencode(self::TEST_RESOURCE_ID) . '/token'
        );
        $token = $resource->token();
        static::assertSame('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJ0ZWxueXhfdGVsZXBob255IiwiZXhwIjoxNTkwMDEwMTQzLCJpYXQiOjE1ODc1OTA5NDMsImlzcyI6InRlbG55eF90ZWxlcGhvbnkiLCJqdGkiOiJiOGM3NDgzNy1kODllLTRhNjUtOWNmMi0zNGM3YTZmYTYwYzgiLCJuYmYiOjE1ODc1OTA5NDIsInN1YiI6IjVjN2FjN2QwLWRiNjUtNGYxMS05OGUxLWVlYzBkMWQ1YzZhZSIsInRlbF90b2tlbiI6InJqX1pra1pVT1pNeFpPZk9tTHBFVUIzc2lVN3U2UmpaRmVNOXMtZ2JfeENSNTZXRktGQUppTXlGMlQ2Q0JSbWxoX1N5MGlfbGZ5VDlBSThzRWlmOE1USUlzenl6U2xfYURuRzQ4YU81MHlhSEd1UlNZYlViU1ltOVdJaVEwZz09IiwidHlwIjoiYWNjZXNzIn0.gNEwzTow5MLLPLQENytca7pUN79PmPj6FyqZWW06ZeEmesxYpwKh0xRtA0TzLh6CDYIRHrI8seofOO0YFGDhpQ', $token);
    }

}
