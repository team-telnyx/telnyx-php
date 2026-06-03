<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression;

use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\BooleanLiteralExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\DynamicVariableExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\NumberLiteralExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Right-hand operand sub-expression.
 *
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right\BooleanLiteralExpression
 *
 * @phpstan-type RightVariants = mixed|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression
 * @phpstan-type RightShape = RightVariants|DynamicVariableExpressionShape|StringLiteralExpressionShape|NumberLiteralExpressionShape|BooleanLiteralExpressionShape
 */
final class Right implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'mixed',
            DynamicVariableExpression::class,
            StringLiteralExpression::class,
            NumberLiteralExpression::class,
            BooleanLiteralExpression::class,
        ];
    }
}
