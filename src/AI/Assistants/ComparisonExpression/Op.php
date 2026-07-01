<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ComparisonExpression;

/**
 * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
 */
enum Op: string
{
    case EQ = '==';

    case NE = '!=';

    case LT = '<';

    case LTE = '<=';

    case GT = '>';

    case GTE = '>=';

    case CONTAINS = 'contains';

    case NOT_CONTAINS = 'not_contains';
}
