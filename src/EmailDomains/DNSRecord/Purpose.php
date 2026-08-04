<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\DNSRecord;

enum Purpose: string
{
    case OWNERSHIP = 'ownership';

    case SPF = 'spf';

    case DKIM = 'dkim';

    case DMARC = 'dmarc';

    case MX = 'mx';
}
