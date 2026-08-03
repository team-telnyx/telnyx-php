<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

enum EmailDomainType: string
{
    case CUSTOM = 'custom';

    case SHARED = 'shared';

    case SHARED_INBOUND = 'shared_inbound';
}
