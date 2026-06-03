<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression;

/**
 * Logical operator. `not` is unary; `and`/`or` are n-ary (>=2).
 */
enum Op: string
{
    case AND = 'and';

    case OR = 'or';

    case NOT = 'not';
}
