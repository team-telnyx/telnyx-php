<?php

declare(strict_types=1);

namespace Telnyx\Queues\QueueNewResponse\Data;

enum RecordType: string
{
    case QUEUE = 'queue';
}
