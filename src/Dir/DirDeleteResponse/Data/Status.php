<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirDeleteResponse\Data;

/**
 * Always `delete_requested`: the DIR has been queued for removal, not yet removed.
 */
enum Status: string
{
    case DELETE_REQUESTED = 'delete_requested';
}
