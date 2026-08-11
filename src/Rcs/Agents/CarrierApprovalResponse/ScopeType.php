<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\CarrierApprovalResponse;

enum ScopeType: string
{
    case CARRIER = 'carrier';

    case HUB = 'hub';

    case BOT = 'bot';
}
