<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListResponse\Data;

enum RecordType: string
{
    case CALL_EVENT = 'call_event';
}
