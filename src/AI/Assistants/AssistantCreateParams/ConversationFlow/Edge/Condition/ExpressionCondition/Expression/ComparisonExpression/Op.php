<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression;

/**
 * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
 */
enum Op: string
{
    case EQUALS = '==';

    case NOT_EQUALS = '!=';

    case LT = '<';

    case LT1 = '<=';

    case GT = '>';

    case GT1 = '>=';

    case CONTAINS = 'contains';

    case NOT_CONTAINS = 'not_contains';
}
