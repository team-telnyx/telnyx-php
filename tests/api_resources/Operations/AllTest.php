<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\ApiOperations\All
 */

class DummyAll extends ApiResource
{
    const OBJECT_NAME = 'phone_number';

    use \Telnyx\ApiOperations\All;
}

final class AllTest extends \Telnyx\TestCase
{
    public function testTrait()
    {
        $result = DummyAll::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $result);
    }
}
