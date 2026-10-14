<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseListParams;

/**
 * Only return enterprises of this type: `bpo` for call-center (BPO) enterprises, `enterprise` for normal enterprises. Omit to return both.
 */
enum FilterRoleType: string
{
    case ENTERPRISE = 'enterprise';

    case BPO = 'bpo';
}
