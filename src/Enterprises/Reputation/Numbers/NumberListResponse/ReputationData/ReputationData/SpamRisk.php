<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberListResponse\ReputationData\ReputationData;

/**
 * Overall spam risk level.
 */
enum SpamRisk: string
{
    case LOW = 'low';

    case MEDIUM = 'medium';

    case HIGH = 'high';
}
