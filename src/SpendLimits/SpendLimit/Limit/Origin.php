<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit\Limit;

/**
 * `self_service` when a user of the account set it, `operator` when Telnyx support did.
 */
enum Origin: string
{
    case SELF_SERVICE = 'self_service';

    case OPERATOR = 'operator';
}
