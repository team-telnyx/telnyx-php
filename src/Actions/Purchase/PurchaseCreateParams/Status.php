<?php

declare(strict_types=1);

namespace Telnyx\Actions\Purchase\PurchaseCreateParams;

/**
 * Status on which the SIM cards will be set after being successfully registered.
 */
enum Status: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case STANDBY = 'standby';
}
