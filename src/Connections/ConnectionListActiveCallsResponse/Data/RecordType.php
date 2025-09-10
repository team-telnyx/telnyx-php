<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse\Data;

enum RecordType: string
{
    case CALL = 'call';
}
