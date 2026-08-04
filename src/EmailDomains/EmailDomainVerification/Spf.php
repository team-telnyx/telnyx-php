<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainVerification;

enum Spf: string
{
    case MISSING_OPTIONAL = 'missing_optional';

    case VERIFIED = 'verified';

    case FAILED = 'failed';

    case NOT_REQUIRED = 'not_required';
}
