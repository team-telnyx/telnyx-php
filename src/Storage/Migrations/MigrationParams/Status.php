<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations\MigrationParams;

/**
 * Status of the migration.
 */
enum Status: string
{
    case PENDING = 'pending';

    case CHECKING = 'checking';

    case MIGRATING = 'migrating';

    case COMPLETE = 'complete';

    case ERROR = 'error';

    case STOPPED = 'stopped';
}
