<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Finding;

enum Detector: string
{
    case SECRETS = 'secrets';

    case DLP = 'dlp';

    case SAFETY = 'safety';
}
