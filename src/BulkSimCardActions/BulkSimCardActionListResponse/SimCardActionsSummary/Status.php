<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionListResponse\SimCardActionsSummary;

enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case INTERRUPTED = 'interrupted';
}
