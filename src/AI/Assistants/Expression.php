<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\Expression\BooleanLiteralExpression;
use Telnyx\AI\Assistants\Expression\DynamicVariableExpression;
use Telnyx\AI\Assistants\Expression\NumberLiteralExpression;
use Telnyx\AI\Assistants\Expression\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * A node in a deterministic expression AST. Exactly one variant is selected by the `type` discriminator. Terminal variants (`number_literal`, `string_literal`, `bool_literal`, `variable`) bottom out the recursion; `arithmetic`, `bool_op`, and `comparison` nest further sub-expressions.
 *
 * Extracted into a single named schema so the recursive union is defined once (was previously inlined at every operand site).
 *
 * @phpstan-import-type ComparisonExpressionShape from \Telnyx\AI\Assistants\ComparisonExpression
 * @phpstan-import-type ArithmeticExpressionShape from \Telnyx\AI\Assistants\ArithmeticExpression
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\Expression\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\Expression\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\Expression\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\Expression\BooleanLiteralExpression
 *
 * @phpstan-type ExpressionVariants = ComparisonExpression|BooleanOpExpression|ArithmeticExpression|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression
 * @phpstan-type ExpressionShape = ExpressionVariants|ComparisonExpressionShape|ArithmeticExpressionShape|DynamicVariableExpressionShape|StringLiteralExpressionShape|NumberLiteralExpressionShape|BooleanLiteralExpressionShape
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
