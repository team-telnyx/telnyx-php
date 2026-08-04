<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\DNSRecord;

enum Status: string
{
    case PENDING = 'pending';

    case VERIFIED = 'verified';

    case FAILED = 'failed';

    case NOT_REQUIRED = 'not_required';
}
