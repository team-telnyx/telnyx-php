<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim;

enum Algorithm: string
{
    case RSA_SHA256 = 'rsa-sha256';
}
