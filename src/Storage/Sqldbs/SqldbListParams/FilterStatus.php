<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\SqldbListParams;

/**
 * Filter by provisioning status.
 */
enum FilterStatus: string
{
    case PENDING = 'pending';

    case PROVISION_OK = 'provision_ok';

    case PROVISION_FAILED = 'provision_failed';

    case DELETING = 'deleting';

    case DELETE_FAILED = 'delete_failed';
}
