<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\ComparisonExpression\Op;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Compare two sub-expressions with a relational or membership operator.
 *
 * Evaluates to a boolean. Used in edge conditions to gate transitions on
 * runtime values, e.g. `user_age >= 18` or `tier == "gold"`.
 *
 * @phpstan-type ComparisonExpressionShape = array{
 *   left: mixed, op: Op|value-of<Op>, right: mixed, type: 'comparison'
 * }
 */
final class ComparisonExpression implements BaseModel
{
    /** @use SdkModel<ComparisonExpressionShape> */
    use SdkModel;

    /** @var 'comparison' $type */
    #[Required]
    public string $type = 'comparison';

    /**
     * Operand sub-expression (Expression AST node). Typed as free-form JSON to support arbitrary recursion depth without an uncompilable by-value self-reference; see the Expression schema for the variant structure.
     */
    #[Required]
    public mixed $left;

    /**
     * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
     *
     * @var value-of<Op> $op
     */
    #[Required(enum: Op::class)]
    public string $op;

    /**
     * Operand sub-expression (Expression AST node). Typed as free-form JSON to support arbitrary recursion depth without an uncompilable by-value self-reference; see the Expression schema for the variant structure.
     */
    #[Required]
    public mixed $right;

    /**
     * `new ComparisonExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComparisonExpression::with(left: ..., op: ..., right: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComparisonExpression)->withLeft(...)->withOp(...)->withRight(...)
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
     * @param Op|value-of<Op> $op
     */
    public static function with(mixed $left, Op|string $op, mixed $right): self
    {
        $self = new self;

        $self['left'] = $left;
        $self['op'] = $op;
        $self['right'] = $right;

        return $self;
    }

    /**
     * Operand sub-expression (Expression AST node). Typed as free-form JSON to support arbitrary recursion depth without an uncompilable by-value self-reference; see the Expression schema for the variant structure.
     */
    public function withLeft(mixed $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    /**
     * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
     *
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $self = clone $this;
        $self['op'] = $op;

        return $self;
    }

    /**
     * Operand sub-expression (Expression AST node). Typed as free-form JSON to support arbitrary recursion depth without an uncompilable by-value self-reference; see the Expression schema for the variant structure.
     */
    public function withRight(mixed $right): self
    {
        $self = clone $this;
        $self['right'] = $right;

        return $self;
    }

    /**
     * @param 'comparison' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
