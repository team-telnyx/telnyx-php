<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitResponse\Data;

/**
 * Customer-facing status of a remediation request.
 */
enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
