<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\BooleanLiteralExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\DynamicVariableExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\NumberLiteralExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Right-hand operand sub-expression.
 *
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right\BooleanLiteralExpression
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
