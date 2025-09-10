<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\TnUploadEntry;

/**
 * Represents the status of the phone number entry upload on Telnyx.
 */
enum InternalStatus: string
{
    case PENDING_ASSIGNMENT = 'pending_assignment';

    case IN_PROGRESS = 'in_progress';

    case ALL_INTERNAL_JOBS_COMPLETED = 'all_internal_jobs_completed';

    case RELEASE_REQUESTED = 'release_requested';

    case RELEASE_COMPLETED = 'release_completed';

    case ERROR = 'error';
}
