<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload;

/**
 * `ported_away`: you confirmed you no longer own it after a carrier change. `unconfirmed_ownership`: the confirmation deadline passed. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own it. Removing a number yourself with `DELETE` sends no event.
 */
enum RemovalReason: string
{
    case PORTED_AWAY = 'ported_away';

    case UNCONFIRMED_OWNERSHIP = 'unconfirmed_ownership';

    case REASSIGNED = 'reassigned';

    case CUSTOMER_REPORTED = 'customer_reported';
}
