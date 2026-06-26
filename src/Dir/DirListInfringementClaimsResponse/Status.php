<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListInfringementClaimsResponse;

/**
 * Lifecycle status. `pending` - newly filed; the DIR is auto-suspended. `contested` - you have submitted contest evidence; awaiting Telnyx review. `resolved` - final.
 */
enum Status: string
{
    case PENDING = 'pending';

    case CONTESTED = 'contested';

    case RESOLVED = 'resolved';
}
