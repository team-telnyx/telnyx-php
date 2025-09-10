<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionListParams;

/**
 * Filter by action type.
 */
enum FilterActionType: string
{
    case BULK_SET_PUBLIC_IPS = 'bulk_set_public_ips';
}
