<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\ApiOperations\Delete
 */

class DummyDelete extends ApiResource
{
    const OBJECT_NAME = 'ip_connection';

    use \Telnyx\ApiOperations\Delete;
}

final class DeleteTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '1293384261075731499';

    public function testTraitDelete()
    {
        $result = DummyDelete::delete(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $result);
    }
}
