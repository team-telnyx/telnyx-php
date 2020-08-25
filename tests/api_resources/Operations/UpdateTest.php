<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\ApiOperations\Update
 */

class DummyUpdate extends ApiResource
{
    const OBJECT_NAME = 'phone_number';

    use \Telnyx\ApiOperations\Update;
}

final class UpdateTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '1293384261075731499';

    public function testTraitUpdate()
    {
        $result = DummyUpdate::update(self::TEST_RESOURCE_ID, ['customer_reference'=>'MY REF 001']);
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $result);
    }

    /*
    // NOTE: do we use the save() function?
    public function testTraitSave()
    {
        $class = new DummyUpdate(self::TEST_RESOURCE_ID);
        $class->customer_reference = 'MY REF 001';
        $result = $class->save();
        $this->assertInstanceOf(\Telnyx\PhoneNumber::class, $result);
    }
    */
}
