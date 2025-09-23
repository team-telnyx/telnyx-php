<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse\Data;

enum Status: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';

    case FAILED = 'FAILED';

    case EXPIRED = 'EXPIRED';
}
