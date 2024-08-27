<?php

namespace Telnyx;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\ApiOperations\Create::class)]


class DummyCreate extends ApiResource
{
    const OBJECT_NAME = 'ip_connection';

    use \Telnyx\ApiOperations\Create;
}

final class CreateTest extends \Telnyx\TestCase
{
    public function testTraitCreate()
    {
        $result = DummyCreate::create(['connection_name'=>'connection name']);
        $this->assertInstanceOf(\Telnyx\IPConnection::class, $result);
    }
}
