<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Finding;

enum Action: string
{
    case FLAG = 'flag';

    case BLOCK = 'block';
}
