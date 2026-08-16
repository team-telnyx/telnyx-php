<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\SqlDatabase;

/**
 * Provisioning status. A database is usable once `status` is `provision_ok`. Once deletion completes, the database no longer appears in the API.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROVISION_OK = 'provision_ok';

    case PROVISION_FAILED = 'provision_failed';

    case DELETING = 'deleting';

    case DELETE_FAILED = 'delete_failed';
}
