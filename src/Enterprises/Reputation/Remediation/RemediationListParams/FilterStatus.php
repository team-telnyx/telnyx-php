<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation\RemediationListParams;

/**
 * Filter by customer-facing status.
 */
enum FilterStatus: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
