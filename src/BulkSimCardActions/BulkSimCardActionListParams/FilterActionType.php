<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionListParams;

/**
 * Filter by action type.
 */
enum FilterActionType: string
{
    case BULK_DISABLE_VOICE = 'bulk_disable_voice';

    case BULK_ENABLE_VOICE = 'bulk_enable_voice';

    case BULK_SET_PUBLIC_IPS = 'bulk_set_public_ips';
}
