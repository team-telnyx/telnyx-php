<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register\RegisterCreateParams;

/**
 * Status on which the SIM card will be set after being successful registered.
 */
enum Status: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case STANDBY = 'standby';
}
