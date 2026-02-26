<?php

declare(strict_types=1);

namespace Telnyx\Queues\QueueUpdateResponse\Data;

enum RecordType: string
{
    case QUEUE = 'queue';
}
