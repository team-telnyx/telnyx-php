<?php

declare(strict_types=1);

namespace Telnyx\Queues\Queue;

enum RecordType: string
{
    case QUEUE = 'queue';
}
