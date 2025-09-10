<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status;

enum Eq: string
{
    case PENDING_UPLOAD = 'pending_upload';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case SUCCESS = 'success';

    case ERROR = 'error';
}
