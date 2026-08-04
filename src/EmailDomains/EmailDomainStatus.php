<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

enum EmailDomainStatus: string
{
    case PENDING = 'pending';

    case VERIFYING = 'verifying';

    case VERIFIED = 'verified';

    case FAILED = 'failed';

    case DEGRADED = 'degraded';

    case SUSPENDED = 'suspended';
}
