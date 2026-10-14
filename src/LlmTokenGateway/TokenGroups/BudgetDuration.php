<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

enum BudgetDuration: string
{
    case _1D = '1d';

    case _7D = '7d';

    case _30D = '30d';
}
