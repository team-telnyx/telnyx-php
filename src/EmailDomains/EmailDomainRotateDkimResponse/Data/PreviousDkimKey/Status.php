<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\PreviousDkimKey;

enum Status: string
{
    case RETIRING = 'retiring';

    case REVOKED = 'revoked';
}
