<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression;

use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\BooleanLiteralExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\DynamicVariableExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\NumberLiteralExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Left-hand operand sub-expression.
 *
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left\BooleanLiteralExpression
 *
 * @phpstan-type LeftVariants = mixed|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression
 * @phpstan-type LeftShape = LeftVariants|DynamicVariableExpressionShape|StringLiteralExpressionShape|NumberLiteralExpressionShape|BooleanLiteralExpressionShape
 */
final class Left implements ConverterSource
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
