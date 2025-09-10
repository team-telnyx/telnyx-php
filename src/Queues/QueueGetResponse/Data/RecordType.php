<?php

declare(strict_types=1);

namespace Telnyx\Queues\QueueGetResponse\Data;

enum RecordType: string
{
    case QUEUE = 'queue';
}
