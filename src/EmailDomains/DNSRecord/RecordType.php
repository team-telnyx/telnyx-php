<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\DNSRecord;

enum RecordType: string
{
    case TXT = 'TXT';

    case MX = 'MX';
}
