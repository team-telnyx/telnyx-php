<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data;

enum Biller: string
{
    case TELNYX = 'telnyx';

    case PROVIDER = 'provider';

    case NONE = 'none';
}
