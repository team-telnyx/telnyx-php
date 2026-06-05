<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseCreateParams;

/**
 * `enterprise` for an organization registering its own DIRs; `bpo` for a Business Process Outsourcer placing calls on behalf of one or more enterprises.
 */
enum RoleType: string
{
    case ENTERPRISE = 'enterprise';

    case BPO = 'bpo';
}
