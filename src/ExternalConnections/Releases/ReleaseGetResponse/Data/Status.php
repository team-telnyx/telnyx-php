<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data;

/**
 * Represents the status of the release on Microsoft Teams.
 */
enum Status: string
{
    case PENDING_UPLOAD = 'pending_upload';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETE = 'complete';

    case FAILED = 'failed';

    case EXPIRED = 'expired';

    case UNKNOWN = 'unknown';
}
