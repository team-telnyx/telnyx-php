<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\TnUploadEntry;

/**
 * Represents the status of the phone number entry upload on Microsoft Teams.
 */
enum Status: string
{
    case PENDING_UPLOAD = 'pending_upload';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case SUCCESS = 'success';

    case ERROR = 'error';
}
