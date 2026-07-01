<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\BooleanOpExpression;

/**
 * Logical operator. `not` is unary; `and`/`or` are n-ary (>=2).
 */
enum Op: string
{
    case AND = 'and';

    case OR = 'or';

    case NOT = 'not';
}
