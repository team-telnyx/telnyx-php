<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse\Data;

enum Direction: string
{
    case INBOUND = 'INBOUND';

    case OUTBOUND = 'OUTBOUND';
}
