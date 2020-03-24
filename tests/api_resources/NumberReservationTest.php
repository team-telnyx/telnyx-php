<?php

namespace Telnyx;

class NumberReservationTest extends TestCase
{
    const NUMBER_RESERVATION_ID = "f7964e2b-a9f9-4eb6-ab16-e570ffc4bc83";

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/number_reservations'
        );
        $resources = NumberReservation::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\NumberReservation::class, $resources['data'][0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/number_reservations/' . urlencode(self::NUMBER_RESERVATION_ID)
        );
        $resource = NumberReservation::retrieve(self::NUMBER_RESERVATION_ID);
        $this->assertInstanceOf(\Telnyx\NumberReservation::class, $resource);
    }
}
