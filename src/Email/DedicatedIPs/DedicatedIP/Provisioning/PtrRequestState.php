<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning;

/**
 * State of the Telnyx PTR change: `pending`, `pr_open`, `merged`, `confirmed`, `failed`, or `abandoned`. Informational.
 */
enum PtrRequestState: string
{
    case PENDING = 'pending';

    case PR_OPEN = 'pr_open';

    case MERGED = 'merged';

    case CONFIRMED = 'confirmed';

    case FAILED = 'failed';

    case ABANDONED = 'abandoned';
}
