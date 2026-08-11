<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\CarrierApprovalResponse;

enum Status: string
{
    case PENDING = 'PENDING';

    case SUBMITTED = 'SUBMITTED';

    case APPROVED = 'APPROVED';

    case REJECTED = 'REJECTED';
}
