<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainVerification;

enum Dkim: string
{
    case PENDING = 'pending';

    case VERIFIED = 'verified';

    case FAILED = 'failed';
}
