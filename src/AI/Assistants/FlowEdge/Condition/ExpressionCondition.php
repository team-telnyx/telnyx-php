<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge\Condition;

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
 * @phpstan-type ExpressionConditionShape = array{
 *   expression: mixed, type: 'expression'
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
     * Root of the expression AST; evaluates to a boolean. Typed as free-form JSON to avoid an uncompilable by-value self-reference; see the Expression schema for the variant structure.
     */
    #[Required]
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
     */
    public static function with(mixed $expression): self
    {
        $self = new self;

        $self['expression'] = $expression;

        return $self;
    }

    /**
     * Root of the expression AST; evaluates to a boolean. Typed as free-form JSON to avoid an uncompilable by-value self-reference; see the Expression schema for the variant structure.
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
