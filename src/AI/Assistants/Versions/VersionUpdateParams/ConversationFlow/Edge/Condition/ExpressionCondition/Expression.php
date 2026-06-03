<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition;

use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanLiteralExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\DynamicVariableExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\NumberLiteralExpression;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Root of the expression AST. Must evaluate to a boolean.
 *
 * @phpstan-import-type ComparisonExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression
 * @phpstan-import-type BooleanOpExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression
 * @phpstan-import-type ArithmeticExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanLiteralExpression
 *
 * @phpstan-type ExpressionVariants = ComparisonExpression|BooleanOpExpression|ArithmeticExpression|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression
 * @phpstan-type ExpressionShape = ExpressionVariants|ComparisonExpressionShape|BooleanOpExpressionShape|ArithmeticExpressionShape|DynamicVariableExpressionShape|StringLiteralExpressionShape|NumberLiteralExpressionShape|BooleanLiteralExpressionShape
 */
final class Expression implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'comparison' => ComparisonExpression::class,
            'bool_op' => BooleanOpExpression::class,
            'arithmetic' => ArithmeticExpression::class,
            'variable' => DynamicVariableExpression::class,
            'string_literal' => StringLiteralExpression::class,
            'number_literal' => NumberLiteralExpression::class,
            'bool_literal' => BooleanLiteralExpression::class,
        ];
    }
}
