<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers\NumberGetResponse\Data\ReputationData\ReputationData;

/**
 * Overall spam risk level.
 */
enum SpamRisk: string
{
    case LOW = 'low';

    case MEDIUM = 'medium';

    case HIGH = 'high';
}
