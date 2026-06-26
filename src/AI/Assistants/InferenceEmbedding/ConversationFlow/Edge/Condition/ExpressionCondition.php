<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition;

use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;
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
 * @phpstan-import-type ExpressionVariants from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression
 * @phpstan-import-type ExpressionShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression
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
     * A node in a deterministic expression AST. Exactly one variant is selected by the `type` discriminator. Terminal variants (`number_literal`, `string_literal`, `bool_literal`, `variable`) bottom out the recursion; `arithmetic`, `bool_op`, and `comparison` nest further sub-expressions.
     *
     * Extracted into a single named schema so the recursive union is defined once (was previously inlined at every operand site).
     *
     * @var ExpressionVariants $expression
     */
    #[Required(union: Expression::class)]
    public mixed $expression;

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
    public static function with(mixed $expression): self
    {
        $self = new self;

        $self['expression'] = $expression;

        return $self;
    }

    /**
     * A node in a deterministic expression AST. Exactly one variant is selected by the `type` discriminator. Terminal variants (`number_literal`, `string_literal`, `bool_literal`, `variable`) bottom out the recursion; `arithmetic`, `bool_op`, and `comparison` nest further sub-expressions.
     *
     * Extracted into a single named schema so the recursive union is defined once (was previously inlined at every operand site).
     *
     * @param ExpressionShape $expression
     */
    public function withExpression(mixed $expression): self
    {
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
