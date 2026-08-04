<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainGetHealthResponse\Data;

/**
 * Current domain status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case VERIFYING = 'verifying';

    case VERIFIED = 'verified';

    case FAILED = 'failed';

    case DEGRADED = 'degraded';

    case SUSPENDED = 'suspended';
}
