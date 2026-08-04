<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainVerification;

enum Dmarc: string
{
    case MISSING_OPTIONAL = 'missing_optional';

    case VERIFIED = 'verified';

    case FAILED = 'failed';
}
