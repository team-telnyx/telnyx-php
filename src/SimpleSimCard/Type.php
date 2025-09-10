<?php

declare(strict_types=1);

namespace Telnyx\SimpleSimCard;

/**
 * The type of SIM card.
 */
enum Type: string
{
    case PHYSICAL = 'physical';

    case ESIM = 'esim';
}
