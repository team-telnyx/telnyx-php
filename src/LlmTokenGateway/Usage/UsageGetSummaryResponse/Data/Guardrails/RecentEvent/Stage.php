<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent;

enum Stage: string
{
    case PROMPT = 'prompt';

    case RESPONSE = 'response';
}
