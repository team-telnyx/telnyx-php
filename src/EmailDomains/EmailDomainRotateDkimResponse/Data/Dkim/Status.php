<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim;

enum Status: string
{
    case ACTIVE = 'active';
}
