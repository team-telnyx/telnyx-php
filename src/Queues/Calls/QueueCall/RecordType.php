<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls\QueueCall;

enum RecordType: string
{
    case QUEUE_CALL = 'queue_call';
}
