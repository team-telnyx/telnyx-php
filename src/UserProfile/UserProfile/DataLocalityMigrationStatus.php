<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfile;

/**
 * Status of the user's data locality migration, or null when no migration status is recorded.
 */
enum DataLocalityMigrationStatus: string
{
    case NOT_STARTED = 'not_started';

    case IN_PROGRESS = 'in_progress';

    case FINISHED = 'finished';
}
