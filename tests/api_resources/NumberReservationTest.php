<?php

namespace Telnyx; 
use PHPUnit\Framework\Attributes\CoversClass;

 
#[CoversClass(\Telnyx\NumberReservation::class)]

final class NumberReservationTest extends \Telnyx\TestCase
{
    const NUMBER_RESERVATION_ID = "12ade33a-21c0-473b-b055-b3c836e1c292";

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

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/number_reservations'
        );
        $resource = \Telnyx\NumberReservation::create([
            "phone_number" => "+19705555098"
        ]);
        $this->assertInstanceOf(\Telnyx\NumberReservation::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/number_reservations/' . urlencode(self::NUMBER_RESERVATION_ID)
        );
        $resource = \Telnyx\NumberReservation::retrieve(self::NUMBER_RESERVATION_ID);
        $this->assertInstanceOf(\Telnyx\NumberReservation::class, $resource);
    }

    public function testActionsExtend()
    {
         
        $number_reservation = \Telnyx\NumberReservation::retrieve(self::NUMBER_RESERVATION_ID);
        $this->expectsRequest(
            'post',
            '/v2/number_reservations/' . urlencode(self::NUMBER_RESERVATION_ID) . '/actions/extend'
        );
        $resource = $number_reservation->actions_extend();
        $this->assertInstanceOf(\Telnyx\NumberReservation::class, $resource);
    }

}
