<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data;

enum UsageStatus: string
{
    case KNOWN = 'known';

    case UNKNOWN = 'unknown';

    case RECONCILED = 'reconciled';
}
