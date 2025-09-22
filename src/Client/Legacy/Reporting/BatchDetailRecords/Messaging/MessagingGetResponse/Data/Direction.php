<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse\Data;

enum Direction: string
{
    case INBOUND = 'INBOUND';

    case OUTBOUND = 'OUTBOUND';
}
