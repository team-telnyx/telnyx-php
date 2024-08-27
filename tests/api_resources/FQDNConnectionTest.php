<?php

namespace Telnyx;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\FQDNConnection::class)]

final class FQDNConnectionTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '7069b206-3e2a-c44e-206f-981c20f8d569';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/fqdn_connections'
        );
        $resources = FQDNConnection::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\FQDNConnection::class, $resources['data'][0]);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/fqdn_connections'
        );
        $resource = FQDNConnection::create(["connection_name" => "Test Connection"]);
        $this->assertInstanceOf(\Telnyx\FQDNConnection::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = FQDNConnection::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v2/fqdn_connections/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource->delete();
        $this->assertInstanceOf(\Telnyx\FQDNConnection::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/fqdn_connections/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = FQDNConnection::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\FQDNConnection::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'patch',
            '/v2/fqdn_connections/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = FQDNConnection::update(self::TEST_RESOURCE_ID, [
            "connection_name" => "Central BSD-1"
        ]);
        $this->assertInstanceOf(\Telnyx\FQDNConnection::class, $resource);
    }
}
