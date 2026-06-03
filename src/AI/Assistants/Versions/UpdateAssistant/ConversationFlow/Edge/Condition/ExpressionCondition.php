<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanLiteralExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\DynamicVariableExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\NumberLiteralExpression;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\StringLiteralExpression;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge condition evaluated as a deterministic expression AST.
 *
 * The expression is computed against runtime dynamic variables and must
 * evaluate to a boolean. Prefer this over `LLMCondition` when the rule is
 * a clean function of known variables — it's cheaper and predictable.
 *
 * @phpstan-import-type ExpressionVariants from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression
 * @phpstan-import-type ExpressionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression
 *
 * @phpstan-type ExpressionConditionShape = array{
 *   expression: ExpressionShape, type: 'expression'
 * }
 */
final class ExpressionCondition implements BaseModel
{
    /** @use SdkModel<ExpressionConditionShape> */
    use SdkModel;

    /** @var 'expression' $type */
    #[Required]
    public string $type = 'expression';

    /**
     * Root of the expression AST. Must evaluate to a boolean.
     *
     * @var ExpressionVariants $expression
     */
    #[Required(union: Expression::class)]
    public ComparisonExpression|BooleanOpExpression|ArithmeticExpression|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression $expression;

    /**
     * `new ExpressionCondition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExpressionCondition::with(expression: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExpressionCondition)->withExpression(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExpressionShape $expression
     */
    public static function with(
        ComparisonExpression|array|BooleanOpExpression|ArithmeticExpression|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression $expression,
    ): self {
        $self = new self;

        $self['expression'] = $expression;

        return $self;
    }

    /**
     * Root of the expression AST. Must evaluate to a boolean.
     *
     * @param ExpressionShape $expression
     */
    public function withExpression(
        ComparisonExpression|array|BooleanOpExpression|ArithmeticExpression|DynamicVariableExpression|StringLiteralExpression|NumberLiteralExpression|BooleanLiteralExpression $expression,
    ): self {
        $self = clone $this;
        $self['expression'] = $expression;

        return $self;
    }

    /**
     * @param 'expression' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
