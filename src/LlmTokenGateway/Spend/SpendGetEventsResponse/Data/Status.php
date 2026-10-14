<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data;

enum Status: string
{
    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';

    case PARTIAL = 'partial';

    case UNKNOWN = 'unknown';
}
