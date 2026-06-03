<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;

use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Op;
use Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Combine sub-expressions with a logical operator (`and` / `or` / `not`).
 *
 * `and` and `or` accept two or more operands; `not` accepts exactly one.
 *
 * @phpstan-import-type OperandVariants from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand
 * @phpstan-import-type OperandShape from \Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\BooleanOpExpression\Operand
 *
 * @phpstan-type BooleanOpExpressionShape = array{
 *   op: Op|value-of<Op>, operands: list<OperandShape>, type: 'bool_op'
 * }
 */
final class BooleanOpExpression implements BaseModel
{
    /** @use SdkModel<BooleanOpExpressionShape> */
    use SdkModel;

    /** @var 'bool_op' $type */
    #[Required]
    public string $type = 'bool_op';

    /**
     * Logical operator. `not` is unary; `and`/`or` are n-ary (>=2).
     *
     * @var value-of<Op> $op
     */
    #[Required(enum: Op::class)]
    public string $op;

    /**
     * Operand sub-expressions. Length must be exactly 1 for `not` and >= 2 for `and`/`or`.
     *
     * @var list<OperandVariants> $operands
     */
    #[Required(list: Operand::class)]
    public array $operands;

    /**
     * `new BooleanOpExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BooleanOpExpression::with(op: ..., operands: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BooleanOpExpression)->withOp(...)->withOperands(...)
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
     * @param list<OperandShape> $operands
     */
    public static function with(Op|string $op, array $operands): self
    {
        $self = new self;

        $self['op'] = $op;
        $self['operands'] = $operands;

        return $self;
    }

    /**
     * Logical operator. `not` is unary; `and`/`or` are n-ary (>=2).
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
     * Operand sub-expressions. Length must be exactly 1 for `not` and >= 2 for `and`/`or`.
     *
     * @param list<OperandShape> $operands
     */
    public function withOperands(array $operands): self
    {
        $self = clone $this;
        $self['operands'] = $operands;

        return $self;
    }

    /**
     * @param 'bool_op' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
