<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ArithmeticExpression;

/**
 * Arithmetic operator applied to `left` and `right`.
 */
enum Op: string
{
    case PLUS = '+';

    case MINUS = '-';

    case MULTIPLY = '*';

    case DIVIDE = '/';

    case MODULO = '%';
}
