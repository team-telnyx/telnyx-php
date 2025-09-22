<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse\Data;

enum Direction: string
{
    case INBOUND = 'INBOUND';

    case OUTBOUND = 'OUTBOUND';
}
