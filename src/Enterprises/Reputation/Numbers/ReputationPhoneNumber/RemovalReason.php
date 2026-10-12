<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;

/**
 * Why a number was removed. `ported_away`: you confirmed the number left your control after a carrier change. `unconfirmed_ownership`: a carrier change was not confirmed before the deadline. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own the number. `customer_removed`: you removed the number.
 */
enum RemovalReason: string
{
    case PORTED_AWAY = 'ported_away';

    case UNCONFIRMED_OWNERSHIP = 'unconfirmed_ownership';

    case REASSIGNED = 'reassigned';

    case CUSTOMER_REPORTED = 'customer_reported';

    case CUSTOMER_REMOVED = 'customer_removed';
}
