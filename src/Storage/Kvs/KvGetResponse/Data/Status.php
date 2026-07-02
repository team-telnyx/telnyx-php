<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\KvGetResponse\Data;

/**
 * Provisioning status. A namespace is usable once `status` is `provision_ok`. Once deletion completes, the namespace no longer appears in the API.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROVISION_OK = 'provision_ok';

    case PROVISION_FAILED = 'provision_failed';

    case DELETING = 'deleting';

    case DELETE_FAILED = 'delete_failed';
}
