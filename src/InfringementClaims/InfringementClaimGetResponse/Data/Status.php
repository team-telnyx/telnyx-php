<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims\InfringementClaimGetResponse\Data;

/**
 * Lifecycle status. `pending` - newly filed; the DIR is auto-suspended. `contested` - you have submitted contest evidence; awaiting Telnyx review. `resolved` - final.
 */
enum Status: string
{
    case PENDING = 'pending';

    case CONTESTED = 'contested';

    case RESOLVED = 'resolved';
}
