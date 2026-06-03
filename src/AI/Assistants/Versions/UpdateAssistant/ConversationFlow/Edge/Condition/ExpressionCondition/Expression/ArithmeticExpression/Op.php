<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression;

/**
 * Arithmetic operator applied to `left` and `right`.
 */
enum Op: string
{
    case PLUS = '+';

    case MINUS = '-';

    case STAR = '*';

    case OP_ = '/';

    case PCT = '%';
}
