<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;

use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left;
use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Op;
use Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Numeric expression: applies an arithmetic operator to two sub-expressions.
 *
 * Useful for derived numeric checks, e.g. `cart_total + shipping > 50`.
 * Both operands should resolve to numbers at runtime.
 *
 * @phpstan-import-type LeftVariants from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left
 * @phpstan-import-type RightVariants from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right
 * @phpstan-import-type LeftShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Left
 * @phpstan-import-type RightShape from \Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right
 *
 * @phpstan-type ArithmeticExpressionShape = array{
 *   left: LeftShape, op: Op|value-of<Op>, right: RightShape, type: 'arithmetic'
 * }
 */
final class ArithmeticExpression implements BaseModel
{
    /** @use SdkModel<ArithmeticExpressionShape> */
    use SdkModel;

    /** @var 'arithmetic' $type */
    #[Required]
    public string $type = 'arithmetic';

    /**
     * Left-hand operand sub-expression.
     *
     * @var LeftVariants $left
     */
    #[Required(union: Left::class)]
    public mixed $left;

    /**
     * Arithmetic operator applied to `left` and `right`.
     *
     * @var value-of<Op> $op
     */
    #[Required(enum: Op::class)]
    public string $op;

    /**
     * Right-hand operand sub-expression.
     *
     * @var RightVariants $right
     */
    #[Required(union: Right::class)]
    public mixed $right;

    /**
     * `new ArithmeticExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArithmeticExpression::with(left: ..., op: ..., right: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArithmeticExpression)->withLeft(...)->withOp(...)->withRight(...)
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
     * @param LeftShape $left
     * @param Op|value-of<Op> $op
     * @param RightShape $right
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
     * Left-hand operand sub-expression.
     *
     * @param LeftShape $left
     */
    public function withLeft(mixed $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    /**
     * Arithmetic operator applied to `left` and `right`.
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
     * Right-hand operand sub-expression.
     *
     * @param RightShape $right
     */
    public function withRight(mixed $right): self
    {
        $self = clone $this;
        $self['right'] = $right;

        return $self;
    }

    /**
     * @param 'arithmetic' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
