<?php

declare(strict_types=1);

namespace Telnyx\ReputationData;

/**
 * Overall spam-risk classification.
 */
enum SpamRisk: string
{
    case LOW = 'low';

    case MEDIUM = 'medium';

    case HIGH = 'high';
}
