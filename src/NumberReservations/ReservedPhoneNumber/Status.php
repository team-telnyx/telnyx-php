<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\ReservedPhoneNumber;

/**
 * The status of the phone number's reservation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
