<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseGetResponse\Data;

/**
 * Role type in Branded Calling / Number Reputation services.
 */
enum RoleType: string
{
    case ENTERPRISE = 'enterprise';

    case BPO = 'bpo';
}
