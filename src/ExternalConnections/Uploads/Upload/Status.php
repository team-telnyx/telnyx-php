<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\Upload;

/**
 * Represents the status of the upload on Microsoft Teams.
 */
enum Status: string
{
    case PENDING_UPLOAD = 'pending_upload';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case PARTIAL_SUCCESS = 'partial_success';

    case SUCCESS = 'success';

    case ERROR = 'error';
}
