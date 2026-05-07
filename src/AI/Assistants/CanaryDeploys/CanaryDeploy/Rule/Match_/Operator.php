<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys\CanaryDeploy\Rule\Match_;

/**
 * Match operator.
 */
enum Operator: string
{
    case IN = 'in';

    case NOT_IN = 'not_in';

    case STARTS_WITH = 'starts_with';
}
