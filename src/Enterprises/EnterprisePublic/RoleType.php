<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterprisePublic;

enum RoleType: string
{
    case ENTERPRISE = 'enterprise';

    case BPO = 'bpo';
}
