<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Retries;

enum Backoff: string
{
    case CONSTANT = 'constant';

    case LINEAR = 'linear';

    case EXPONENTIAL = 'exponential';
}
