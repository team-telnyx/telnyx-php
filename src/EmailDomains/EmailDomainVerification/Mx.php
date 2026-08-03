<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainVerification;

enum Mx: string
{
    case NOT_REQUIRED = 'not_required';

    case PENDING = 'pending';

    case VERIFIED = 'verified';

    case FAILED = 'failed';
}
