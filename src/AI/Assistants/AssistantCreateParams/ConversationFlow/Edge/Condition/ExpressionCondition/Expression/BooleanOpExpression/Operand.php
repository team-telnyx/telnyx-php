<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression;

use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\BooleanLiteralExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\DynamicVariableExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\NumberLiteralExpression;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\StringLiteralExpression;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Reference a dynamic variable by name.
 *
 * Resolved at runtime from the assistant's dynamic-variables context (see
 * `Assistant.dynamic_variables` and the dynamic-variables webhook).
 *
 * @phpstan-import-type DynamicVariableExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\DynamicVariableExpression
 * @phpstan-import-type StringLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\StringLiteralExpression
 * @phpstan-import-type NumberLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\NumberLiteralExpression
 * @phpstan-import-type BooleanLiteralExpressionShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand\BooleanLiteralExpression
 *
 * @phpstan-type OperandVariants = mixed|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression
 * @phpstan-type OperandShape = OperandVariants|DynamicVariableExpressionShape|StringLiteralExpressionShape|NumberLiteralExpressionShape|BooleanLiteralExpressionShape
 */
final class Operand implements ConverterSource
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
