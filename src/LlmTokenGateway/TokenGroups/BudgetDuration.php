<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

enum BudgetDuration: string
{
    case BUDGET_DURATION_1_D = '1d';

    case BUDGET_DURATION_7_D = '7d';

    case BUDGET_DURATION_30_D = '30d';
}
