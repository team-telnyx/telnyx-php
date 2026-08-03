<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainVerification;

enum Ownership: string
{
    case PENDING = 'pending';

    case VERIFIED = 'verified';

    case NOT_REQUIRED = 'not_required';
}
