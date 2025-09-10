<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\NumberReservation;

/**
 * The status of the entire reservation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
