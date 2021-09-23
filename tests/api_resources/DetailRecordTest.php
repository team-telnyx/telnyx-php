<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\DetailRecord
 */
final class DetailRecordTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '123';

    public function testIsSearchable()
    {
        $this->expectsRequest(
            'get',
            '/v2/detail_records'
        );
        $resources = DetailRecord::search(['filter[record_type]' => 'messaging']);
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        
        // NOTE: telnyx-mock should return 'message_detail_record' which converts to a default TelnyxObject
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resources['data'][0]);
    }

}
