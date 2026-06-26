<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

/**
 * Customer-facing status of a remediation request.
 */
enum RemediationStatus: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
