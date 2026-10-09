<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterprisePublic;

/**
 * Whether Telnyx has approved this BPO (Business Process Outsourcer) account. Only set for accounts created with `role_type` `bpo`; `null` for normal enterprises. A BPO enterprise must be `approved` before a DIR can be linked to it through `bpo_authorizations`.
 */
enum BpoVerificationStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
